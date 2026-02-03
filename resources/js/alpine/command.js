export default function (model = null, config = {}) {
    return {
        open: false,
        search: '',
        activeIndex: 0,
        lastFocusedElement: null,
        _config: {
            onOpen: null,
            onClose: null,
            ...config,
        },

        init() {
            if (model) {
                // Sync with parent Alpine data if available
                if (typeof this.$data.data !== 'undefined') {
                    const field = model.replace(/^data\./, '');
                    this.$watch('open', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => {
                        if (val && !this.open) {
                            this.toggle(true);
                        } else if (!val && this.open) {
                            this.toggle(false);
                        }
                    });
                    
                    if (typeof this.$data.data[field] !== 'undefined' && this.$data.data[field] !== null) {
                        if (this.$data.data[field] && !this.open) {
                            this.toggle(true);
                        }
                    }
                }
            }
        },

        get filteredItems() {
            return Array.from(this.$refs.items.querySelectorAll('[role=option]')).filter((item) => {
                return item.textContent.toLowerCase().includes(this.search.toLowerCase());
            });
        },

        toggle(force = null) {
            const nextOpen = force !== null ? force : !this.open;
            
            if (nextOpen) {
                this.lastFocusedElement = document.activeElement;
                this.open = true;
                this.search = '';
                this.activeIndex = 0;
                this.$nextTick(() => this.$refs.input.focus());
                this.triggerCallback('onOpen');
            } else {
                this.open = false;
                if (this.lastFocusedElement) {
                    this.lastFocusedElement.focus();
                }
                this.triggerCallback('onClose');
            }
        },

        triggerCallback(name) {
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback();
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback);
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
