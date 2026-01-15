export default (initialTotal = 1, initialCurrent = 1, onEachSide = 1) => ({
    total: initialTotal,
    current: initialCurrent,
    onEachSide: onEachSide,

    get pages() {
        if (this.total <= 1) return [1];
        if (this.total <= 7) return Array.from({ length: this.total }, (_, i) => i + 1);

        let p = [1];
        if (this.current > this.onEachSide + 2) p.push('...');

        let start = Math.max(2, this.current - this.onEachSide);
        let end = Math.min(this.total - 1, this.current + this.onEachSide);

        for (let i = start; i <= end; i++) p.push(i);

        if (this.current < this.total - (this.onEachSide + 1)) p.push('...');
        p.push(this.total);
        return p;
    },

    init() {
        const observer = new MutationObserver(() => this.sync());
        observer.observe(this.$el, { attributes: true, attributeFilter: ['total', 'current'] });
        this.sync();
    },

    sync() {
        const t = parseInt(this.$el.getAttribute('total'));
        const c = parseInt(this.$el.getAttribute('current'));
        if (!isNaN(t)) this.total = t;
        if (!isNaN(c)) this.current = c;
    },

    dispatch(page) {
        if (page === '...') return;
        this.$dispatch('change', { page: page });
    }
});
