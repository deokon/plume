export default function (initialTab = '1', config = {}) {
    return {
        activeTab: initialTab,
        _config: {
            onTabChange: null,
            ...config,
        },

        init() {
            this.$watch('activeTab', (value) => {
                this.triggerCallback('onTabChange', value);
            });
        },

        triggerCallback(name, value) {
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(value);
            } else if (typeof callback === 'string') {
                // If the callback is an expression, we can evaluate it
                // We provide 'tab' as a variable in the scope
                this.$nextTick(() => {
                    window.Alpine.evaluate(this.$el, callback, {
                        scope: { tab: value },
                    });
                });
            }
        },
    };
}
