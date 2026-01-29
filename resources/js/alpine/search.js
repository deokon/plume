export default function (model = null, config = {}) {
    return {
        open: false,
        query: '',
        _config: {
            onSelect: null,
            ...config,
        },

        init() {
            if (model) {
                // Sync with parent Alpine data if available
                if (typeof this.$data.data !== 'undefined') {
                    const field = model.replace(/^data\./, '');
                    this.$watch('query', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => (this.query = val));
                    this.query = this.$data.data[field];
                }
            }
        },

        handleSelect(data) {
            const callback = this._config.onSelect;
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(data);
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback, {
                    scope: { result: data },
                });
            }
        },
    };
}
