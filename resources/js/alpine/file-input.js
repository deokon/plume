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
                        fileObj.progress = Math.round((e.loaded / e.total) * 100);
                    }
                };

                xhr.onload = () => {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        const response = JSON.parse(xhr.responseText);
                        fileObj.id = response.id;
                        fileObj.progress = 100;
                    } else {
                        fileObj.error = 'Upload failed';
                    }
                    this.syncModel();
                    resolve();
                };

                xhr.onerror = () => {
                    fileObj.error = 'Network error';
                    this.syncModel();
                    resolve();
                };

                xhr.send(formData);
            });
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

            if (typeof this.$data[this.model] !== 'undefined') {
                this.$data[this.model] = this.$refs.input.multiple ? ids : ids[0] || null;
            }
        },
    };
}
