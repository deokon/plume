export default function (model = null, uploadUrl = null) {
    return {
        isDropping: false,
        files: [],
        model: model,
        uploadUrl: uploadUrl,
        uploading: false,

        init() {
            if (this.model && typeof this.$data[this.model] === 'undefined') {
                // If the model is passed but not yet in the data (rare but possible),
                // we might need to handle it, but usually Alpine components
                // in Plume are nested within x-data="form(...)".
            }
        },

        handleDrop(event) {
            const newFiles = Array.from(event.dataTransfer.files);
            this.addFiles(newFiles);
            this.isDropping = false;
        },
        handleFileSelect(event) {
            const newFiles = Array.from(event.target.files);
            this.addFiles(newFiles);
        },
        async addFiles(newFiles) {
            if (!newFiles.length) return;

            const updatedFiles = newFiles.map((file) => {
                const fileObj = {
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    preview: null,
                    raw: file,
                    progress: 0,
                    id: null,
                    error: null,
                };

                if (file.type.startsWith('image/')) {
                    fileObj.preview = URL.createObjectURL(file);
                }

                return fileObj;
            });

            if (this.$refs.input.multiple) {
                this.files = [...this.files, ...updatedFiles];
            } else {
                this.files = [updatedFiles[0]];
            }

            if (this.uploadUrl) {
                this.uploading = true;
                this.$dispatch('plume-busy');
                try {
                    await Promise.all(updatedFiles.map((f) => this.uploadFile(f)));
                } finally {
                    this.uploading = this.files.some((f) => f.progress < 100 && !f.error);
                    if (!this.uploading) this.$dispatch('plume-idle');
                }
            }

            this.updateInput();
            this.syncModel();
        },
        async uploadFile(fileObj) {
            return new Promise((resolve) => {
                // Ensure UI reflects 0% state
                this.updateFileInArray(fileObj, { progress: 0 });

                const formData = new FormData();
                formData.append('file', fileObj.raw);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', this.uploadUrl);

                const token =
                    document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
                    document.querySelector('input[name="_token"]')?.value ||
                    window.Laravel?.csrfToken ||
                    '';
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.setRequestHeader('Accept', 'application/json');

                xhr.upload.onprogress = (e) => {
                    if (e.lengthComputable) {
                        const progress = Math.round((e.loaded / e.total) * 100);
                        this.updateFileInArray(fileObj, { progress });
                    }
                };

                xhr.onload = () => {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        const response = JSON.parse(xhr.responseText);
                        this.updateFileInArray(fileObj, {
                            id: response.id,
                            progress: 100,
                            error: null,
                        });
                    } else {
                        let errorMessage = 'Upload failed';
                        try {
                            const response = JSON.parse(xhr.responseText);
                            errorMessage = response.message || response.error || errorMessage;
                        } catch (e) {}
                        this.updateFileInArray(fileObj, { error: errorMessage });
                    }
                    this.syncModel();
                    this.syncErrors();
                    resolve();
                };

                xhr.onerror = () => {
                    this.updateFileInArray(fileObj, { error: 'Network error' });
                    this.syncModel();
                    this.syncErrors();
                    resolve();
                };

                xhr.send(formData);
            });
        },
        updateFileInArray(fileObj, updates) {
            const index = this.files.findIndex(
                (f) => f.name === fileObj.name && f.size === fileObj.size
            );
            if (index !== -1) {
                // Merge updates into the object
                Object.assign(fileObj, updates);
                // Trigger reactivity by replacing the object in the array using splice
                this.files.splice(index, 1, { ...fileObj });
            }
        },
        removeFile(index) {
            const file = this.files[index];
            if (file.preview) {
                URL.revokeObjectURL(file.preview);
            }
            this.files.splice(index, 1);
            this.updateInput();
            this.syncModel();
        },
        updateInput() {
            if (this.uploadUrl) return; // Don't update native input if we are using identifiers
            const dataTransfer = new DataTransfer();
            this.files.forEach((file) => dataTransfer.items.add(file.raw));
            this.$refs.input.files = dataTransfer.files;
        },
        syncModel() {
            if (!this.model || !this.uploadUrl) return;

            const ids = this.files.map((f) => f.id).filter((id) => id !== null);
            const value = this.$refs.input.multiple ? ids : ids[0] || null;

            // Resolve nested path on the component proxy
            const parts = this.model.split('.');
            let obj = this;

            while (parts.length > 1) {
                const part = parts.shift();
                if (obj[part] === undefined) return;
                obj = obj[part];
            }

            if (obj) {
                obj[parts[0]] = value;
            }
        },
        syncErrors() {
            if (!this.model || typeof this.errors === 'undefined') return;

            const firstError = this.files.find((f) => f.error)?.error || null;
            const key = this.model.replace(/^data\./, '');

            if (firstError) {
                this.errors[key] = firstError;
            } else if (this.errors[key]) {
                delete this.errors[key];
            }
        },
    };
}
