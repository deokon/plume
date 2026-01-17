export default function () {
    return {
        open: false,
        search: '',
        activeIndex: 0,
        get filteredItems() {
            return Array.from(this.$refs.items.querySelectorAll('[role=option]')).filter((item) => {
                return item.textContent.toLowerCase().includes(this.search.toLowerCase());
            });
        },
        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.search = '';
                this.activeIndex = 0;
                this.$nextTick(() => this.$refs.input.focus());
            }
        },
        onKeydown(e) {
            if (e.key === 'ArrowDown') {
                this.activeIndex = (this.activeIndex + 1) % this.filteredItems.length;
                e.preventDefault();
            } else if (e.key === 'ArrowUp') {
                this.activeIndex =
                    (this.activeIndex - 1 + this.filteredItems.length) % this.filteredItems.length;
                e.preventDefault();
            } else if (e.key === 'Enter') {
                if (this.filteredItems[this.activeIndex]) {
                    this.filteredItems[this.activeIndex].click();
                }
                e.preventDefault();
            }
        },
    };
}
