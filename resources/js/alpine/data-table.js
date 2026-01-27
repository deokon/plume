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
