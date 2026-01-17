export default function (Alpine) {
    Alpine.magic('openDrawer', () => (name) => {
        window.dispatchEvent(new CustomEvent('open-drawer', { detail: name }));
    });

    Alpine.magic('closeDrawer', () => (name = null) => {
        window.dispatchEvent(new CustomEvent('close-drawer', { detail: name }));
    });

    Alpine.data('drawer', (name, initialShow = false) => ({
        show: initialShow,
        name: name,

        init() {
            this.$watch('show', value => {
                if (value) {
                    document.body.classList.add('overflow-y-hidden');
                } else {
                    document.body.classList.remove('overflow-y-hidden');
                }
            });

            window.addEventListener('open-drawer', event => {
                if (event.detail === this.name) {
                    this.show = true;
                }
            });

            window.addEventListener('close-drawer', event => {
                if (!event.detail || event.detail === this.name) {
                    this.show = false;
                }
            });
        },

        close() {
            this.show = false;
        }
    }));
}
