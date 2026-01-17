export default (perPage = 10, paginated = false, sortable = true) => ({
    data: [],
    columns: [],
    search: '',
    sortCol: '',
    sortDir: 'asc',
    page: 1,
    perPage: parseInt(perPage) || 10,
    paginated: !!paginated,
    sortable: !!sortable,

    init() {
        this.sync();
        const observer = new MutationObserver(() => this.sync());
        observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });
        this.$watch('search', () => (this.page = 1));
    },

    sync() {
        try {
            const d = this.$el.getAttribute('data');
            const c = this.$el.getAttribute('columns');

            if (d) {
                const parsedData = JSON.parse(d);
                if (Array.isArray(parsedData)) {
                    this.data = parsedData;
                } else {
                    console.warn('Plume Data Table: "data" attribute must be an array.');
                }
            }

            if (c) {
                const parsedCols = JSON.parse(c);
                if (Array.isArray(parsedCols)) {
                    this.columns = parsedCols;
                } else {
                    console.warn('Plume Data Table: "columns" attribute must be an array.');
                }
            }
        } catch (e) {
            console.error(
                'Plume Data Table sync error: Invalid JSON provided to data or columns.',
                e
            );
        }
    },

    get filteredData() {
        if (!Array.isArray(this.data)) return [];

        let filtered = [...this.data];

        if (this.search) {
            const query = this.search.toLowerCase();
            filtered = filtered.filter((row) => {
                return Object.values(row).some((val) => String(val).toLowerCase().includes(query));
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
        const data = this.filteredData;
        if (!this.paginated) return data;
        const start = (this.page - 1) * this.perPage;
        return data.slice(start, start + this.perPage);
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
    },
});
