import { trigger } from './utils';

export default function (Alpine) {
    Alpine.magic('openDrawer', () => (name) => {
        window.dispatchEvent(new CustomEvent('open-drawer', { detail: name }));
    });

    Alpine.magic('closeDrawer', () => (name = null) => {
        window.dispatchEvent(new CustomEvent('close-drawer', { detail: name }));
    });

    Alpine.data('drawer', (name, initialShow = false, config = {}) => ({
        show: initialShow,
        name: name,
        lastFocusedElement: null,
        _config: {
            onOpen: null,
            onClose: null,
            ...config,
        },

        init() {
            this.$watch('show', (value) => {
                if (value) {
                    this.lastFocusedElement = document.activeElement;
                    document.body.classList.add('overflow-y-hidden');
                    // Optional: autofocus first element after animation
                    setTimeout(() => this.firstFocusable().focus(), 300);

                    this.triggerCallback('onOpen');
                } else {
                    document.body.classList.remove('overflow-y-hidden');
                    if (this.lastFocusedElement) {
                        this.lastFocusedElement.focus();
                    }

                    this.triggerCallback('onClose');
                }
            });

            window.addEventListener('open-drawer', (event) => {
                if (event.detail === this.name) {
                    this.show = true;
                }
            });

            window.addEventListener('close-drawer', (event) => {
                if (!event.detail || event.detail === this.name) {
                    this.show = false;
                }
            });
        },

        close() {
            this.show = false;
        },

        focusables() {
            let selector =
                'a, button, input:not([type="hidden"]), textarea, select, details, [tabindex]:not([tabindex="-1"])';
            return [...this.$el.querySelectorAll(selector)].filter(
                (el) => !el.hasAttribute('disabled') && getComputedStyle(el).display !== 'none'
            );
        },

        firstFocusable() {
            return this.focusables()[0] || this.$el;
        },
        lastFocusable() {
            return this.focusables().slice(-1)[0] || this.$el;
        },
        nextFocusable() {
            return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable();
        },
        prevFocusable() {
            return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable();
        },
        nextFocusableIndex() {
            return (
                (this.focusables().indexOf(document.activeElement) + 1) %
                (this.focusables().length + 1)
            );
        },
        prevFocusableIndex() {
            return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1;
        },

        handleTab(event) {
            if (event.shiftKey) {
                this.prevFocusable().focus();
            } else {
                this.nextFocusable().focus();
            }
        },

        triggerCallback(name, detail = {}) {
            trigger(this, name, detail);
        },
    }));
}
