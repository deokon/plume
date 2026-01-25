export default function (options, model, config = {}) {
    return {
        open: false,
        search: '',
        value: null,
        options: options,
        emptyMessage: config.emptyMessage || 'No results found.',
        _config: {
            onSelect: null,
            ...config,
        },
        filteredOptions: [],
        activeIndex: -1,
        init() {
            this.filteredOptions = this.options;

            if (model) {
                // Sync with parent Alpine data if available
                if (typeof this.$data[model] !== 'undefined') {
                    this.$watch('value', (val) => (this.$data[model] = val));
                    this.$watch('$data.' + model, (val) => (this.value = val));
                    this.value = this.$data[model];
                }
            }

            this.$watch('search', () => {
                this.filterOptions();
                this.activeIndex = -1;
                if (this.search !== '' && !this.open) {
                    this.open = true;
                }
            });
        },
        get selectedLabel() {
            const opt = this.options.find((o) => o.value == this.value);
            return opt ? opt.label : '';
        },
        filterOptions() {
            if (this.search === '') {
                this.filteredOptions = this.options;
            } else {
                this.filteredOptions = this.options.filter((opt) =>
                    String(opt.label).toLowerCase().includes(this.search.toLowerCase())
                );
            }
        },
        select(option) {
            this.value = option.value;
            this.search = '';
            this.open = false;
            this.activeIndex = -1;

            this.triggerCallback('onSelect', option.value);
        },
        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => this.$refs.searchInput.focus());
            }
        },
        onKeydown(e) {
            if (!this.open) {
                if (e.key === 'ArrowDown' || e.key === 'ArrowUp' || e.key === 'Enter') {
                    this.open = true;
                    e.preventDefault();
                }
                return;
            }

            if (e.key === 'ArrowDown') {
                this.activeIndex = (this.activeIndex + 1) % this.filteredOptions.length;
                this.scrollToActive();
                e.preventDefault();
            } else if (e.key === 'ArrowUp') {
                this.activeIndex =
                    (this.activeIndex - 1 + this.filteredOptions.length) %
                    this.filteredOptions.length;
                this.scrollToActive();
                e.preventDefault();
            } else if (e.key === 'Enter') {
                if (this.activeIndex >= 0 && this.filteredOptions[this.activeIndex]) {
                    this.select(this.filteredOptions[this.activeIndex]);
                    e.preventDefault();
                }
            } else if (e.key === 'Escape') {
                this.open = false;
            } else if (e.key === 'Tab') {
                this.open = false;
            }
        },
        scrollToActive() {
            this.$nextTick(() => {
                const activeEl = this.$refs.list.children[this.activeIndex];
                if (activeEl) activeEl.scrollIntoView({ block: 'nearest' });
            });
        },

        triggerCallback(name, value) {
            const callback = this._config[name];
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(value);
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback, {
                    scope: { value },
                });
            }
        },
    };
}
