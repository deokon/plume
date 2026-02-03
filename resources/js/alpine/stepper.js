import { trigger } from './utils';

export default function (initialStep = 1, model = null, config = {}) {
    return {
        active: initialStep,
        _config: {
            onStepChange: null,
            onFinish: null,
            ...config,
        },

        init() {
            if (model) {
                // Sync with parent Alpine data if available
                if (this.$data && typeof this.$data.data !== 'undefined') {
                    const field = model.replace(/^data\./, '');
                    this.$watch('active', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => (this.active = val));
                    
                    if (typeof this.$data.data[field] !== 'undefined' && this.$data.data[field] !== null) {
                        this.active = this.$data.data[field];
                    }
                }
            }

            this.$watch('active', (value) => {
                this.triggerCallback('onStepChange', value);
            });
        },

        finish() {
            this.triggerCallback('onFinish', this.active);
        },

        triggerCallback(name, value) {
            trigger(this, name, { step: value });
        },
    };
}
