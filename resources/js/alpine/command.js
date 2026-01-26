export default function () {
    return {
        open: false,
        search: '',
        activeIndex: 0,
        lastFocusedElement: null,

        get filteredItems() {
            return Array.from(this.$refs.items.querySelectorAll('[role=option]')).filter((item) => {
                return item.textContent.toLowerCase().includes(this.search.toLowerCase());
            });
        },

        toggle() {
            if (!this.open) {
                this.lastFocusedElement = document.activeElement;
                this.open = true;
                this.search = '';
                this.activeIndex = 0;
                this.$nextTick(() => this.$refs.input.focus());
            } else {
                this.open = false;
                if (this.lastFocusedElement) {
                    this.lastFocusedElement.focus();
                }
            }
        },

        focusables() {
            // Include input and any role=option
            let selector = 'input, [role=option]';
            return Array.from(this.$el.querySelectorAll(selector)).filter(
                (el) => !el.hasAttribute('disabled') && getComputedStyle(el).display !== 'none'
            );
        },

        handleTab(event) {
            const focusables = this.focusables();
            if (focusables.length === 0) return;

            const first = focusables[0];
            const last = focusables[focusables.length - 1];

            if (event.shiftKey && document.activeElement === first) {
                last.focus();
                event.preventDefault();
            } else if (!event.shiftKey && document.activeElement === last) {
                first.focus();
                event.preventDefault();
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
