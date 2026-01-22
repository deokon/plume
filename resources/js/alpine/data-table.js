export default (perPage = 10, paginated = false, sortable = true, url = null, initialData = [], initialColumns = []) => ({
    data: initialData,
    columns: initialColumns,
    search: '',
    sortCol: '',
    sortDir: 'asc',
    page: 1,
    perPage: parseInt(perPage) || 10,
    paginated: !!paginated,
    sortable: !!sortable,
    url: url,
    loading: false,
    total: 0,

    init() {
        this.sync();

        if (this.url) {
            this.fetch();
            this.$watch('search', () => {
                this.page = 1;
                this.fetch();
            });
            this.$watch('page', () => this.fetch());
            this.$watch('sortCol', () => this.fetch());
            this.$watch('sortDir', () => this.fetch());
        }

        const observer = new MutationObserver(() => this.sync());
        observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });

        if (!this.url) {
            this.$watch('search', () => (this.page = 1));
        }
    },

    sync() {
        try {
            const d = this.$el.getAttribute('data');
            const c = this.$el.getAttribute('columns');

            if (d && !d.startsWith('[object ')) {
                const parsedData = JSON.parse(d);
                if (Array.isArray(parsedData) && JSON.stringify(parsedData) !== JSON.stringify(this.data)) {
                    this.data = parsedData;
                }
            }

            if (c && !c.startsWith('[object ')) {
                const parsedCols = JSON.parse(c);
                if (Array.isArray(parsedCols) && JSON.stringify(parsedCols) !== JSON.stringify(this.columns)) {
                    this.columns = parsedCols;
                }
            }
        } catch (e) {
            console.error(
                'Plume Data Table sync error: Invalid JSON provided to data or columns.',
                e
            );
        }
    },

    async fetch() {
        if (!this.url) return;
        this.loading = true;

        const params = new URLSearchParams({
            page: this.page,
            per_page: this.perPage,
            search: this.search,
            sort_col: this.sortCol,
            sort_dir: this.sortDir,
        });

        try {
            const response = await fetch(`${this.url}?${params.toString()}`);
            const result = await response.json();

            if (result.success) {
                this.data = result.data.items;
                this.total = result.data.pagination.total;
            }
        } catch (e) {
            console.error('Plume Data Table fetch error:', e);
        } finally {
            this.loading = false;
        }
    },

    get filteredData() {
        if (this.url) return this.data;

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
        if (this.url) return this.data;

        const data = this.filteredData;
        if (!this.paginated) return data;
        const start = (this.page - 1) * this.perPage;
        return data.slice(start, start + this.perPage);
    },

    get totalItems() {
        return this.url ? this.total : this.filteredData.length;
    },

    get totalPages() {
        return Math.ceil(this.totalItems / this.perPage) || 1;
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
