import { trigger } from './utils';

export default function (initialTab = '1', model = null, config = {}) {
    return {
        activeTab: initialTab,
        _config: {
            onTabChange: null,
            ...config,
        },

        init() {
            if (model) {
                // Sync with parent Alpine data if available
                if (typeof this.$data.data !== 'undefined') {
                    const field = model.replace(/^data\./, '');
                    this.$watch('activeTab', (val) => (this.$data.data[field] = val));
                    this.$watch('$data.data.' + field, (val) => (this.activeTab = val));
                    
                    if (typeof this.$data.data[field] !== 'undefined' && this.$data.data[field] !== null) {
                        this.activeTab = this.$data.data[field];
                    }
                }
            }

            this.$watch('activeTab', (value) => {
                this.triggerCallback('onTabChange', value);
            });
        },

        triggerCallback(name, value) {
            trigger(this, name, { value });
        },
    };
}
