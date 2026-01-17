export default function (Alpine) {
    Alpine.magic('toast', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            ...options
        });
    });

    Alpine.magic('success', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            type: 'success',
            ...options
        });
    });

    Alpine.magic('error', (el, { Alpine }) => (message, options = {}) => {
        Alpine.store('toasts').add({
            message,
            type: 'error',
            ...options
        });
    });

    Alpine.store('toasts', {
        items: [],
        add(toast) {
            const id = Date.now();
            this.items.push({
                id,
                ...toast
            });
            if (toast.autoclose !== false) {
                setTimeout(() => this.remove(id), toast.duration || 3000);
            }
        },
        remove(id) {
            this.items = this.items.filter(t => t.id !== id);
        }
    });
}
