export default function (Alpine) {
    Alpine.store('toasts', {
        items: [],
        add(toast) {
            const id = Date.now();
            this.items.push({ 
                id, 
                position: 'bottom-right',
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