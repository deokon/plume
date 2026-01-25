export function accordion(alwaysOpen, config = {}) {
    return {
        active: null,
        alwaysOpen: alwaysOpen,
        _config: {
            onToggle: null,
            ...config,
        },
        select(id) {
            if (this.alwaysOpen) return;
            this.active = this.active === id ? null : id;
        },
        triggerToggle(id, isOpen) {
            const callback = this._config.onToggle;
            if (!callback) return;

            if (typeof callback === 'function') {
                callback(id, isOpen);
            } else if (typeof callback === 'string') {
                window.Alpine.evaluate(this.$el, callback, {
                    scope: { id, isOpen },
                });
            }
        },
    };
}

export function accordionItem(id, open) {
    return {
        id: id,
        get isOpen() {
            if (this.alwaysOpen) return this.localOpen;
            return this.active === this.id;
        },
        set isOpen(value) {
            if (this.alwaysOpen) {
                this.localOpen = value;
                this.triggerToggle(this.id, value);
            } else {
                const wasActive = this.active === this.id;
                this.select(this.id);
                const nowActive = this.active === this.id;
                if (wasActive !== nowActive) {
                    this.triggerToggle(this.id, nowActive);
                }
            }
        },
        localOpen: open,
    };
}
