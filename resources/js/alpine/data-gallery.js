import { createDataComponent } from './base-data-component.js';

export default (perPage = 12, paginated = false, url = null, initialData = []) => {
    return createDataComponent({
        perPage,
        paginated,
        url,
        initialData,
    });
};
