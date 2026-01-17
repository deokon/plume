export default function (Alpine) {
    Alpine.magic('openModal', () => (name) => {
        window.dispatchEvent(new CustomEvent('open-modal', { detail: name }));
    });

    Alpine.magic('closeModal', () => (name = null) => {
        window.dispatchEvent(new CustomEvent('close-modal', { detail: name }));
    });

    Alpine.data('modal', (name, initialShow = false, autofocus = false) => ({
        show: initialShow,
        name: name,
        autofocus: autofocus,

        init() {
            this.$watch('show', value => {
                if (value) {
                    const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
                    document.body.style.paddingRight = `${scrollbarWidth}px`;
                    document.body.classList.add('overflow-y-hidden');
                    if (this.autofocus) {
                        setTimeout(() => this.firstFocusable().focus(), 100);
                    }
                } else {
                    document.body.classList.remove('overflow-y-hidden');
                    document.body.style.paddingRight = null;
                }
            });

            window.addEventListener('open-modal', event => {
                if (event.detail === this.name) {
                    this.show = true;
                }
            });

            window.addEventListener('close-modal', event => {
                if (!event.detail || event.detail === this.name) {
                    this.show = false;
                }
            });
        },

        close() {
            this.show = false;
        },

        focusables() {
            // All focusable element types
            let selector = 'a, button, input:not([type="hidden"]), textarea, select, details, [tabindex]:not([tabindex="-1"])';
            return [...this.$el.querySelectorAll(selector)]
                // filter out with display: none
                .filter(el => ! el.hasAttribute('disabled') && getComputedStyle(el).display !== 'none');
        },

        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1 },

        handleTab(event) {
            if (event.shiftKey) {
                this.prevFocusable().focus();
            } else {
                this.nextFocusable().focus();
            }
        }
    }));
}