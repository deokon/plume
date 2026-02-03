/**
 * Factory function for creating shared pagination/data-list Alpine components
 * Used by both data-table and data-gallery components
 *
 * @param {Object} options - Configuration options
 * @param {number} options.perPage - Items per page
 * @param {boolean} options.paginated - Enable pagination
 * @param {string|null} options.url - Server-side URL
 * @param {Array} options.initialData - Initial data array
 * @param {Array} options.columns - Column definitions (for data-table)
 * @param {Array} options.sortableColumns - Columns that support sorting
 * @param {Object} options.onSync - Custom sync handler
 * @param {Object} options.onFetch - Custom fetch parameters builder
 * @returns {Object} Alpine component object
 */
export function createDataComponent(options) {
    const {
        perPage = 10,
        paginated = false,
        url = null,
        initialData = [],
        columns = [],
        sortableColumns = [],
        searchableColumns = [],
        onSync = null,
        onFetch = null,
        callbacks = {},
    } = options;

    return {
        data: initialData,
        columns: columns,
        searchableColumns: searchableColumns,
        search: '',
        sortCol: sortableColumns.length > 0 ? sortableColumns[0] : '',
        sortDir: 'asc',
        page: 1,
        perPage: parseInt(perPage) || 10,
        paginated: !!paginated,
        url: url,
        loadingCount: 0,
        callbacks: callbacks,

        get loading() {
            return this.loadingCount > 0;
        },

        latestRequestId: 0,
        total: 0,
        totalPages: 1,

        init() {
            this.sync();
            this.updateTotalPages();

            // Trigger initial load if we have data
            if (this.data.length > 0) {
                this.trigger('load', { data: this.data });
            }

            if (this.$el && typeof this.$el.addEventListener === 'function') {
                this.$el.addEventListener('plume-refresh', () => {
                    if (this.url) this.fetch();
                });
            }

            this.$watch('search', (value) => {
                if (this.url) {
                    this.page = 1;
                    this.fetch();
                }
                this.trigger('filter', { search: value });
            });

            this.$watch('page', (value) => {
                if (this.url) this.fetch();
                this.trigger('page-change', { page: value });
            });

            this.$watch('sortCol', (value) => {
                if (this.url) this.fetch();
                this.trigger('sort', { column: value, direction: this.sortDir });
            });

            this.$watch('sortDir', (value) => {
                if (this.url) this.fetch();
                this.trigger('sort', { column: this.sortCol, direction: value });
            });

            if (this.url) {
                this.fetch();
            }

            if (this.$el && typeof MutationObserver !== 'undefined') {
                const observer = new MutationObserver(() => {
                    this.sync();
                    this.updateTotalPages();
                });
                observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });
            }

            if (!this.url) {
                this.$watch('data', () => {
                    this.updateTotalPages();
                });
                this.$watch('search', () => {
                    this.page = 1;
                    this.updateTotalPages();
                });
            }
        },

        updateTotalPages() {
            this.totalPages = Math.ceil(this.totalItems / this.perPage) || 1;
        },

        trigger(name, detail = {}) {
            this.$dispatch(`plume-${name}`, detail);

            // Convert kebab-case (e.g., page-change) to camelCase for callback lookup (e.g., onPageChange)
            const callbackKey = 'on' + name.split('-').map(part => part.charAt(0).toUpperCase() + part.slice(1)).join('');
            const callback = this.callbacks[callbackKey];

            if (callback) {
                if (typeof callback === 'function') {
                    callback.call(this, detail);
                } else if (typeof callback === 'string' && window.Alpine) {
                    window.Alpine.evaluate(this.$el, callback, {
                        scope: { ...detail, $event: { detail } }
                    });
                }
            }
        },

        sync() {
            try {
                if (!this.$el) return;

                const d = this.$el.getAttribute('data');
                const c = this.$el.getAttribute('columns');

                if (!this.url && d && !d.startsWith('[object ')) {
                    const parsedData = JSON.parse(d);
                    // Only update if current data is empty or different, and not just stringified object
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

                if (onSync) {
                    onSync.call(this, d);
                }
            } catch (e) {
                // If parsing fails, it might be because the attribute is already a JS array (Alpine bound)
                // We ignore the error in that case.
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

            if (this.sortCol) {
                params.append('sort_col', this.sortCol);
                params.append('sort_dir', this.sortDir);
            }

            if (onFetch) {
                onFetch.call(this, params);
            }

            try {
                const fetchUrl = this.url.startsWith('http') 
                    ? `${this.url}?${params.toString()}`
                    : `${window.location.origin}${this.url.startsWith('/') ? '' : '/'}${this.url}?${params.toString()}`;

                const response = await fetch(fetchUrl);
                if (!response.ok) {
                    const errorBody = await response.text();
                    throw new Error(`HTTP error! status: ${response.status}, body: ${errorBody}`);
                }
                const result = await response.json();

                if (requestId !== this.latestRequestId) return;

                if (result.success) {
                    this.data = result.data.items;
                    this.total = result.data.pagination.total;
                    this.updateTotalPages();
                    this.trigger('load', { data: this.data });
                } else {
                    console.error('Plume Data Component fetch error: result.success is false', result);
                }
            } catch (e) {
                if (requestId === this.latestRequestId) {
                    console.error('Plume Data Component fetch error:', e.message);
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

            if (!Array.isArray(this.data)) {
                console.warn('Plume Data Component: data is not an array', this.data);
                return [];
            }

            let filtered = [...this.data];

            if (this.search) {
                const query = this.search.toLowerCase();
                const hasSearchableCols =
                    Array.isArray(this.searchableColumns) && this.searchableColumns.length > 0;

                filtered = filtered.filter((item) => {
                    if (hasSearchableCols) {
                        return this.searchableColumns.some((col) =>
                            String(item[col] || '')
                                .toLowerCase()
                                .includes(query)
                        );
                    }

                    // Fallback to searching all values if no columns specified
                    // We join values to avoid multiple some() iterations on small strings
                    return Object.values(item).join(' ').toLowerCase().includes(query);
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
            if (this.url) {
                return [...this.data];
            }

            if (!this.paginated) return this.filteredData;

            const start = (this.page - 1) * this.perPage;
            const end = start + this.perPage;
            return this.filteredData.slice(start, end);
        },
    };
}
