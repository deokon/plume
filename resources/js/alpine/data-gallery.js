import { createDataComponent } from './base-data-component.js';

export default (perPage = 10, paginated = false, url = null, initialData = [], callbacks = {}) => {
    return createDataComponent({
        perPage,
        paginated,
        url,
        initialData,
        columns: [],
        sortableColumns: [],
        callbacks: callbacks,
    });
};
