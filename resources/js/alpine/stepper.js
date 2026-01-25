export default function (initialStep = 1, config = {}) {
    return {
        active: initialStep,
        _config: {
            onStepChange: null,
            onFinish: null,
            ...config,
        },

        init() {
            this.$watch('active', (value) => {
                this.triggerCallback('onStepChange', value);
            });
        },

        finish() {
            this.triggerCallback('onFinish', this.active);
        },

        triggerCallback(name, value) {
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(value);
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback, {
                    scope: { step: value },
                });
            }
        },
    };
}
