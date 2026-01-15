export default (perPage = 10, paginated = false, sortable = true) => ({
    data: [],
    columns: [],
    search: '',
    sortCol: '',
    sortDir: 'asc',
    page: 1,
    perPage: perPage,
    paginated: paginated,
    sortable: sortable,

    init() {
        this.sync();
        const observer = new MutationObserver(() => this.sync());
        observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });
        this.$watch('search', () => this.page = 1);
    },

    sync() {
        try {
            const d = this.$el.getAttribute('data');
            const c = this.$el.getAttribute('columns');
            if (d) this.data = JSON.parse(d);
            if (c) this.columns = JSON.parse(c);
        } catch (e) {
            console.error('Data Table sync error:', e);
        }
    },

    get filteredData() {
        let filtered = [...this.data];

        if (this.search) {
            const query = this.search.toLowerCase();
            filtered = filtered.filter(row => {
                return Object.values(row).some(val =>
                    String(val).toLowerCase().includes(query)
                );
            });
        }

        if (this.sortCol) {
            filtered.sort((a, b) => {
                let valA = a[this.sortCol];
                let valB = b[this.sortCol];

                if (valA < valB) return this.sortDir === 'asc' ? -1 : 1;
                if (valA > valB) return this.sortDir === 'asc' ? 1 : -1;
                return 0;
            });
        }

        return filtered;
    },

    get pagedData() {
        if (!this.paginated) return this.filteredData;
        const start = (this.page - 1) * this.perPage;
        return this.filteredData.slice(start, start + this.perPage);
    },

    get totalPages() {
        return Math.ceil(this.filteredData.length / this.perPage) || 1;
    },

    toggleSort(key) {
        if (this.sortCol === key) {
            this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            this.sortCol = key;
            this.sortDir = 'asc';
        }
    }
});
