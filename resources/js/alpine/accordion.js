import { trigger } from './utils';

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
            trigger(this, 'onToggle', { id, isOpen });
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
