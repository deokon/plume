export default function (config = {}) {
    return {
        open: false,
        query: '',
        _config: {
            onSelect: null,
            ...config,
        },

        init() {
            // Placeholder for initialization if needed
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
