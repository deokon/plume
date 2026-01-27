export default (perPage = 12, paginated = false, url = null, initialData = []) => {
    return {
        data: initialData,
        search: '',
        page: 1,
        perPage: parseInt(perPage) || 12,
        paginated: !!paginated,
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
            }

            const observer = new MutationObserver(() => {
                this.sync();
                this.updateTotalPages();
            });
            observer.observe(this.$el, { attributes: true, attributeFilter: ['data'] });

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

                if (!this.url && d && !d.startsWith('[object ')) {
                    const parsedData = JSON.parse(d);
                    if (
                        Array.isArray(parsedData) &&
                        JSON.stringify(parsedData) !== JSON.stringify(this.data)
                    ) {
                        this.data = parsedData;
                    }
                }
            } catch (e) {
                console.error('Plume Data Gallery sync error: Invalid JSON provided to data.', e);
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
                    console.error('Plume Data Gallery fetch error:', e);
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
                filtered = filtered.filter((item) => {
                    return Object.values(item).some((val) =>
                        String(val).toLowerCase().includes(query)
                    );
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
    };
};
