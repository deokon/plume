import { createDataComponent } from './base-data-component.js';

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

    const sortableColumns = sortable ? initialColumns.map(col => col.slot || col.key).filter(Boolean) : [];

    const base = createDataComponent({
        perPage,
        paginated,
        url,
        initialData,
        columns: initialColumns,
        sortableColumns: sortableColumns,
    });

    // Return a new object that delegates to base but adds data-table specific features
    const component = Object.create(base);
    component.sortable = !!sortable;

    component.init = function() {
        base.init.call(this);

        // Add columns mutation observation
        if (this.$el && typeof MutationObserver !== 'undefined') {
            const observer = new MutationObserver(() => {
                this.sync.call(this);
                this.updateTotalPages.call(this);
            });
            observer.observe(this.$el, { attributes: true, attributeFilter: ['data', 'columns'] });
        }
    };

    component.fetch = async function() {
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

            if (requestId !== this.latestRequestId) return;

            if (result.success) {
                this.data = result.data.items;
                this.total = result.data.pagination.total;
                this.updateTotalPages();
            }
        } catch (e) {
            if (requestId === this.latestRequestId) {
                console.error('Plume Data Table fetch error:', e);
            }
        } finally {
            this.loadingCount--;
        }
    };

    component.toggleSort = function(col) {
        if (this.sortCol === col) {
            this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            this.sortCol = col;
            this.sortDir = 'asc';
        }
    };

    component.getSortIcon = function(column) {
        if (this.sortCol !== column) return 'sort';
        return this.sortDir === 'asc' ? 'chevron-up' : 'chevron-down';
    };

    component.renderConstructed = function(template, row) {
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
    };

    return component;
};
