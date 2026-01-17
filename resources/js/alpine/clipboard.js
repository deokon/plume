export default function (Alpine) {
    Alpine.magic('copy', () => (text) => {
        navigator.clipboard.writeText(text);
    });

    Alpine.data('clipboard', (text = null) => ({
        copied: false,
        copy(customText = null) {
            let content = customText || text;

            // If no text is provided, try to get from $refs.code or $el
            if (!content) {
                content = this.$refs.code ? this.$refs.code.innerText : this.$el.innerText;
            }

            navigator.clipboard.writeText(content).then(() => {
                this.copied = true;
                setTimeout(() => (this.copied = false), 2000);
            });
        },
    }));
}
