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
                if (typeof item.onShow === 'function') {
                    item.onShow(item);
                } else if (typeof item.onShow === 'string') {
                    window.Alpine.evaluate(document.body, item.onShow, {
                        scope: { toast: item }
                    });
                }
            }

            if (toast.autoclose !== false) {
                setTimeout(() => this.remove(id), toast.duration || 3000);
            }
        },
        remove(id) {
            const item = this.items.find((t) => t.id === id);
            if (item && item.onDismiss) {
                if (typeof item.onDismiss === 'function') {
                    item.onDismiss(item);
                } else if (typeof item.onDismiss === 'string') {
                    window.Alpine.evaluate(document.body, item.onDismiss, {
                        scope: { toast: item }
                    });
                }
            }
            this.items = this.items.filter((t) => t.id !== id);
        },
    });
}
