export default function (model = null, uploadUrl = null) {
    return {
        isDropping: false,
        files: [],
        model: model,
        uploadUrl: uploadUrl,
        uploading: false,
        value: null,

        init() {
            if (this.model) {
                // Sync with parent Alpine data if available
                if (typeof this.$data.data !== 'undefined') {
                    const field = this.model.replace(/^data\./, '');
                    this.$watch('value', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => (this.value = val));
                    this.value = this.$data.data[field];
                }
            }

            this.$watch('value', (val) => {
                if (!val || (Array.isArray(val) && val.length === 0)) {
                    if (this.files.length > 0) {
                        this.files = [];
                        this.updateInput();
                    }
                }
            });
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

            // Clear any previous errors when new files are added
            this.syncErrors(null);

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
                        const id = response.data?.id || response.id;
                        this.updateFileInArray(fileObj, {
                            id: id,
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
            
            // Clear errors when files are removed
            this.syncErrors(null);
            
            this.updateInput();
            this.syncModel();
        },
        updateInput() {
            if (this.uploadUrl) return; // Don't update native input if we are using identifiers
            const dataTransfer = new DataTransfer();
            this.files.forEach((file) => dataTransfer.items.add(file.raw));
            this.$refs.input.files = dataTransfer.files;
            
            // Update value even if not uploading, so we can track selection reactively
            if (!this.uploadUrl) {
                this.value = this.$refs.input.multiple ? Array.from(dataTransfer.files) : dataTransfer.files[0] || null;
            }
        },
        syncModel() {
            if (!this.model || !this.uploadUrl) return;

            const ids = this.files.map((f) => f.id).filter((id) => id !== null);
            this.value = this.$refs.input.multiple ? ids : ids[0] || null;
        },
        syncErrors(errorMessage = undefined) {
            if (!this.model) return;

            // Get the field key by stripping the 'data.' prefix
            const key = this.model.replace(/^data\./, '');

            // Access the parent form's error bag.
            // In Alpine, nested components can often access parent data directly.
            // We search for an 'errors' object in the scope.
            let errorBag = null;

            // Use 'this.errors' which Alpine will look up the chain if it's not on this component.
            if (this.errors && typeof this.errors === 'object') {
                errorBag = this.errors;
            } else if (this.$data && typeof this.$data.errors === 'object') {
                errorBag = this.$data.errors;
            }

            // If we couldn't find an error bag, silently return
            if (!errorBag) return;

            // If errorMessage is provided, set it; if null, clear it; if undefined, use current file errors
            if (errorMessage !== undefined) {
                if (errorMessage) {
                    errorBag[key] = errorMessage;
                } else {
                    delete errorBag[key];
                }
            } else {
                // Default behavior: check files for errors
                const firstError = this.files.find((f) => f.error)?.error || null;
                if (firstError) {
                    errorBag[key] = firstError;
                } else if (errorBag[key]) {
                    delete errorBag[key];
                }
            }
        },
    };
}
