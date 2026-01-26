export default (initialTotal = 1, initialCurrent = 1, onEachSide = 1) => ({
    total: parseInt(initialTotal) || 1,
    current: parseInt(initialCurrent) || 1,
    onEachSide: parseInt(onEachSide) || 1,

    get pages() {
        const total = Math.max(1, this.total);
        if (total <= 1) return [1];
        if (total <= 7) return Array.from({ length: total }, (_, i) => i + 1);

        let p = [1];
        if (this.current > this.onEachSide + 2) p.push('...');

        let start = Math.max(2, this.current - this.onEachSide);
        let end = Math.min(total - 1, this.current + this.onEachSide);

        for (let i = start; i <= end; i++) p.push(i);

        if (this.current < total - (this.onEachSide + 1)) p.push('...');
        p.push(total);
        return p;
    },

    init() {
        this.$watch('total', (val) => {
            const t = parseInt(val);
            if (!isNaN(t) && t >= 0) {
                if (this.current > t) {
                    this.current = Math.max(1, t);
                }
            }
        });

        const observer = new MutationObserver(() => this.sync());
        observer.observe(this.$el, {
            attributes: true,
            attributeFilter: [
                'total',
                'current',
                'data-total',
                'data-current',
                ':total',
                ':current',
                'x-bind:total',
                'x-bind:current',
            ],
        });

        // Initial sync after a short tick to ensure Alpine attributes are processed
        this.$nextTick(() => this.sync());
    },

    sync() {
        const tAttr =
            this.$el.getAttribute('data-total') ||
            this.$el.getAttribute('total') ||
            this.$el.getAttribute(':total') ||
            this.$el.getAttribute('x-bind:total');
        const cAttr =
            this.$el.getAttribute('data-current') ||
            this.$el.getAttribute('current') ||
            this.$el.getAttribute(':current') ||
            this.$el.getAttribute('x-bind:current');

        const t = parseInt(tAttr);
        const c = parseInt(cAttr);

        if (!isNaN(t) && t >= 0 && t !== this.total) {
            this.total = t;
        }

        if (!isNaN(c) && c !== this.current) {
            this.current = Math.max(1, Math.min(c, this.total || 1));
        }
    },

    dispatch(page) {
        if (page === '...') return;
        const targetPage = Math.max(1, Math.min(page, this.total));
        // Use a more specific event name to avoid conflicts
        this.$dispatch('plume-page-change', { page: targetPage });
    },
});
