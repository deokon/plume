export function accordion(alwaysOpen) {
    return {
        active: null,
        alwaysOpen: alwaysOpen,
        select(id) {
            if (this.alwaysOpen) return;
            this.active = (this.active === id) ? null : id;
        }
    }
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
            } else {
                this.select(this.id);
            }
        },
        localOpen: open
    }
}
