import { trigger } from './utils';

export default function (Alpine) {
    Alpine.magic('toast', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            ...options,
        });
    });

    Alpine.magic('success', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            type: 'success',
            ...options,
        });
    });

    Alpine.magic('error', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            type: 'error',
            ...options,
        });
    });

    Alpine.store('toasts', {
        items: [],
        add(toast) {
            const id = Date.now();
            const item = {
                id,
                ...toast,
            };
            this.items.push(item);

            if (item.onShow) {
                trigger({
                    $el: document.body,
                    $dispatch: (name, detail) => window.dispatchEvent(new CustomEvent(name, { detail })),
                    _config: item
                }, 'onShow', { toast: item });
            }

            if (toast.autoclose !== false) {
                setTimeout(() => this.remove(id), toast.duration || 3000);
            }
        },
        remove(id) {
            const item = this.items.find((t) => t.id === id);
            if (item && item.onDismiss) {
                trigger({
                    $el: document.body,
                    $dispatch: (name, detail) => window.dispatchEvent(new CustomEvent(name, { detail })),
                    _config: item
                }, 'onDismiss', { toast: item });
            }
            this.items = this.items.filter((t) => t.id !== id);
        },
    });
}
