export default function () {
    return {
        isDropping: false,
        files: [],
        handleDrop(event) {
            const newFiles = Array.from(event.dataTransfer.files);
            this.addFiles(newFiles);
            this.isDropping = false;
        },
        handleFileSelect(event) {
            const newFiles = Array.from(event.target.files);
            this.addFiles(newFiles);
        },
        addFiles(newFiles) {
            if (!newFiles.length) return;

            const updatedFiles = newFiles.map((file) => {
                const fileObj = {
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    preview: null,
                    raw: file,
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

            this.updateInput();
        },
        removeFile(index) {
            const file = this.files[index];
            if (file.preview) {
                URL.revokeObjectURL(file.preview);
            }
            this.files.splice(index, 1);
            this.updateInput();
        },
        updateInput() {
            const dataTransfer = new DataTransfer();
            this.files.forEach((file) => dataTransfer.items.add(file.raw));
            this.$refs.input.files = dataTransfer.files;
        },
    };
}
