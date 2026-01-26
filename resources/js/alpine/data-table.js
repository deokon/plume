export default (
    perPage = 10,
    paginated = false,
    sortable = true,
    url = null,
    initialData = [],
    initialColumns = [],
    initialSlots = {}
) => {
    let _slots = initialSlots;

    return {
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
        loadingCount: 0,
        get loading() {
            return this.loadingCount > 0;
        },
        latestRequestId: 0,
        total: 0,
        totalPages: 1,

        init() {
            this.sync();
            this.updateTotalPages();

            this.$el.addEventListener('plume-refresh', () => {
                if (this.url) this.fetch();
            });

            if (this.url) {
                this.fetch();
                this.$watch('search', () => {
                    this.page = 1;
                    this.fetch();
                });
                this.$watch('page', (value) => {
                    if (this.url) this.fetch();
                });
                this.$watch('sortCol', () => {
                    if (this.url) this.fetch();
                });
                this.$watch('sortDir', () => {
                    if (this.url) this.fetch();
                });
            }

            const observer = new MutationObserver(() => {
                this.sync();
                this.updateTotalPages();
            });
            observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });

            if (!this.url) {
                this.$watch('search', () => {
                    this.page = 1;
                    this.updateTotalPages();
                });
            }
        },

        updateTotalPages() {
            this.totalPages = Math.ceil(this.totalItems / this.perPage) || 1;
        },

        sync() {
            try {
                const d = this.$el.getAttribute('data');
                const c = this.$el.getAttribute('columns');

                if (!this.url && d && !d.startsWith('[object ')) {
                    const parsedData = JSON.parse(d);
                    if (
                        Array.isArray(parsedData) &&
                        JSON.stringify(parsedData) !== JSON.stringify(this.data)
                    ) {
                        this.data = parsedData;
                    }
                }

                if (c && !c.startsWith('[object ')) {
                    const parsedCols = JSON.parse(c);
                    if (
                        Array.isArray(parsedCols) &&
                        JSON.stringify(parsedCols) !== JSON.stringify(this.columns)
                    ) {
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
            this.loadingCount++;
            const requestId = ++this.latestRequestId;

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

                // Ignore if a newer request has been started
                if (requestId !== this.latestRequestId) return;

                if (result.success) {
                    this.data = result.data.items;
                    this.total = result.data.pagination.total;
                    this.updateTotalPages();
                }
            } catch (e) {
                // Only log if it's the latest request
                if (requestId === this.latestRequestId) {
                    console.error('Plume Data Table fetch error:', e);
                }
            } finally {
                this.loadingCount--;
            }
        },

        get totalItems() {
            return this.url ? this.total : this.filteredData.length;
        },

        get filteredData() {
            if (this.url) return [...this.data];

            if (!Array.isArray(this.data)) return [];

            let filtered = [...this.data];

            if (this.search) {
                const query = this.search.toLowerCase();
                filtered = filtered.filter((row) => {
                    return Object.values(row).some((val) =>
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
            if (this.url) return [...this.data];

            if (!this.paginated) return this.filteredData;

            const start = (this.page - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredData.slice(start, end);
        },

        toggleSort(col) {
            if (this.sortCol === col) {
                this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortCol = col;
                this.sortDir = 'asc';
            }
        },

        renderConstructed(template, row) {
            if (!template) return '';

            // First resolve slots: {slot:name}
            let rendered = template.replace(/{slot:([\w.]+)}/g, (match, slotName) => {
                return _slots[slotName] !== undefined ? _slots[slotName] : '';
            });

            // Then resolve keys: {key}
            return rendered.replace(/{([\w.]+)}/g, (match, key) => {
                const keys = key.split('.');
                let value = row;
                for (const k of keys) {
                    value = value ? value[k] : undefined;
                }
                return value !== undefined ? value : '';
            });
        },
    };
};
