export default function () {
    return {
        isDropping: false,
        file: null,
        handleDrop(event) {
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                this.$refs.input.files = files;
                this.file = files[0];
            }
            this.isDropping = false;
        },
        handleFileSelect(event) {
            const files = event.target.files;
            if (files.length > 0) {
                this.file = files[0];
            }
        },
        removeFile() {
            this.$refs.input.value = '';
            this.file = null;
        },
    };
}
