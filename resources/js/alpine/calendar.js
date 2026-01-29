export default (
    initialValue = null,
    mode = 'single',
    minDateStr = null,
    maxDateStr = null,
    modelName = null,
    config = {}
) => ({
    value: initialValue,
    selectedDate: null,
    rangeStart: null,
    rangeEnd: null,
    currDate: new Date(),
    _config: {
        onDateSelect: null,
        ...config,
    },
    days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    monthNames: [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ],
    mode: mode,
    minDate: minDateStr ? new Date(minDateStr) : null,
    maxDate: maxDateStr ? new Date(maxDateStr) : null,

    init() {
        if (this.mode === 'single' && this.value) {
            this.selectedDate = this.parseDate(this.value);
            this.currDate = new Date(this.selectedDate);
        }
        if (this.mode === 'range' && Array.isArray(this.value) && this.value.length > 0) {
            this.rangeStart = this.parseDate(this.value[0]);
            if (this.value[1]) this.rangeEnd = this.parseDate(this.value[1]);
            this.currDate = new Date(this.rangeStart);
        }

        if (modelName) {
            // Sync with parent Alpine data if available
            if (typeof this.$data.data !== 'undefined') {
                const field = modelName.replace(/^data\./, '');
                this.$watch('value', (val) => (this.$data.data[field] = val));
                this.$watch('$data.data.' + field, (val) => (this.value = val));
                this.value = this.$data.data[field];
            }
        }

        this.$watch('value', (val) => {
            this.syncInternalState(val);
        });
    },

    syncInternalState(val) {
        if (this.mode === 'single') {
            this.selectedDate = this.parseDate(val);
            if (this.selectedDate) this.currDate = new Date(this.selectedDate);
        } else if (Array.isArray(val)) {
            this.rangeStart = this.parseDate(val[0]);
            this.rangeEnd = this.parseDate(val[1]);
            if (this.rangeStart) this.currDate = new Date(this.rangeStart);
        }
    },

    parseDate(dateStr) {
        if (!dateStr) return null;
        // Check if dateStr is already a Date object
        if (dateStr instanceof Date) return dateStr;

        const parts = String(dateStr).split('-');
        if (parts.length === 3) {
            return new Date(parts[0], parts[1] - 1, parts[2]);
        }
        return new Date(dateStr);
    },

    formatDate(date) {
        if (!date) return null;
        const offset = date.getTimezoneOffset();
        const localDate = new Date(date.getTime() - offset * 60 * 1000);
        return localDate.toISOString().split('T')[0];
    },

    get year() {
        return this.currDate.getFullYear();
    },
    get month() {
        return this.currDate.getMonth();
    },
    get monthName() {
        return this.monthNames[this.month];
    },

    get calendarDays() {
        const daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
        const firstDayIndex = new Date(this.year, this.month, 1).getDay();

        let days = [];
        for (let i = 0; i < firstDayIndex; i++) {
            days.push({ day: '', disabled: true });
        }
        for (let i = 1; i <= daysInMonth; i++) {
            const date = new Date(this.year, this.month, i);
            let disabled = false;

            if (this.minDate && date < this.minDate) disabled = true;
            if (this.maxDate && date > this.maxDate) disabled = true;

            days.push({ day: i, disabled: disabled, date: date });
        }
        return days;
    },

    nextMonth() {
        this.currDate = new Date(this.year, this.month + 1, 1);
    },

    prevMonth() {
        this.currDate = new Date(this.year, this.month - 1, 1);
    },

    selectDate(day) {
        if (day.disabled) return;

        if (this.mode === 'single') {
            this.selectedDate = day.date;
            this.value = this.formatDate(day.date);
            this.$dispatch('change', this.value);
        } else {
            if (!this.rangeStart || (this.rangeStart && this.rangeEnd)) {
                this.rangeStart = day.date;
                this.rangeEnd = null;
                this.value = [this.formatDate(this.rangeStart), null];
            } else {
                if (day.date < this.rangeStart) {
                    this.rangeEnd = this.rangeStart;
                    this.rangeStart = day.date;
                } else {
                    this.rangeEnd = day.date;
                }
                this.value = [this.formatDate(this.rangeStart), this.formatDate(this.rangeEnd)];
                this.$dispatch('change', this.value);
            }
        }
        this.$dispatch('input', this.value);
        this.triggerCallback('onDateSelect', this.value);
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

    isSelected(day) {
        if (day.disabled) return false;
        if (this.mode === 'single') {
            return (
                this.selectedDate && day.date.toDateString() === this.selectedDate.toDateString()
            );
        } else {
            if (this.rangeStart && day.date.toDateString() === this.rangeStart.toDateString())
                return true;
            if (this.rangeEnd && day.date.toDateString() === this.rangeEnd.toDateString())
                return true;
            return false;
        }
    },

    isInRange(day) {
        if (this.mode !== 'range' || !this.rangeStart || !this.rangeEnd || day.disabled)
            return false;
        return day.date > this.rangeStart && day.date < this.rangeEnd;
    },

    isToday(day) {
        if (day.disabled) return false;
        return day.date.toDateString() === new Date().toDateString();
    },
});
