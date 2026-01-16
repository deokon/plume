{{--
@component x-plume::calendar
@description A visual calendar interface for selecting dates.
--}}
@props([
    'model' => null,
    'value' => null,
    'min' => null, // 'YYYY-MM-DD'
    'max' => null, // 'YYYY-MM-DD'
    'mode' => 'single', // 'single', 'range'
])

<div
    x-data="{
        value: @if($value) {{ $mode === 'range' ? json_encode($value) : "'$value'" }} @else {{ $mode === 'range' ? '[]' : 'null' }} @endif,
        selectedDate: null,
        rangeStart: null,
        rangeEnd: null,
        currDate: new Date(),
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        mode: '{{ $mode }}',
        minDate: '{{ $min }}' ? new Date('{{ $min }}') : null,
        maxDate: '{{ $max }}' ? new Date('{{ $max }}') : null,
        
        init() {
            if (this.mode === 'single' && this.value) {
                this.selectedDate = this.parseDate(this.value);
                this.currDate = new Date(this.selectedDate);
            } else if (this.mode === 'range' && Array.isArray(this.value) && this.value.length > 0) {
                this.rangeStart = this.parseDate(this.value[0]);
                if (this.value[1]) this.rangeEnd = this.parseDate(this.value[1]);
                this.currDate = new Date(this.rangeStart);
            }
            
             @if($model)
                if (typeof $data.{{ $model }} !== 'undefined') {
                     if ($data.{{ $model }}) {
                         this.value = $data.{{ $model }};
                         this.syncInternalState(this.value);
                     }
                }
            @endif

            this.$watch('value', val => {
                this.syncInternalState(val);
                this.$dispatch('change', val);
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
            if(!dateStr) return null;
            const parts = dateStr.split('-');
            if(parts.length === 3) {
                 return new Date(parts[0], parts[1] - 1, parts[2]);
            }
            return new Date(dateStr);
        },

        formatDate(date) {
            if(!date) return null;
            const offset = date.getTimezoneOffset();
            const localDate = new Date(date.getTime() - (offset*60*1000));
            return localDate.toISOString().split('T')[0];
        },
        
        get year() { return this.currDate.getFullYear(); },
        get month() { return this.currDate.getMonth(); },
        get monthName() { return this.monthNames[this.month]; },
        
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
        },
        
        isSelected(day) {
            if (day.disabled) return false;
            if (this.mode === 'single') {
                return this.selectedDate && day.date.toDateString() === this.selectedDate.toDateString();
            } else {
                if (this.rangeStart && day.date.toDateString() === this.rangeStart.toDateString()) return true;
                if (this.rangeEnd && day.date.toDateString() === this.rangeEnd.toDateString()) return true;
                return false;
            }
        },

        isInRange(day) {
            if (this.mode !== 'range' || !this.rangeStart || !this.rangeEnd || day.disabled) return false;
            return day.date > this.rangeStart && day.date < this.rangeEnd;
        },
        
        isToday(day) {
            if (day.disabled) return false;
            return day.date.toDateString() === new Date().toDateString();
        }
    }"
    x-modelable="value"
    {{ $attributes->merge(['class' => 'w-full max-w-[280px] bg-background dark:bg-background-800 border border-background-700/40 dark:border-background-400/20 rounded-xl shadow-sm p-4']) }}
>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-4">
        <button @click="prevMonth" type="button" class="p-1 hover:bg-background-100 dark:hover:bg-background-800 rounded-full transition-colors text-foreground/70">
            <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-5" />
        </button>
        <div class="font-semibold text-sm">
            <span x-text="monthName"></span> <span x-text="year"></span>
        </div>
        <button @click="nextMonth" type="button" class="p-1 hover:bg-background-100 dark:hover:bg-background-800 rounded-full transition-colors text-foreground/70">
             <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-5" />
        </button>
    </div>
    
    {{-- Grid Headers --}}
    <div class="grid grid-cols-7 gap-1 text-center mb-2">
        <template x-for="day in days">
            <div x-text="day" class="text-xs font-medium text-foreground/50 h-8 flex items-center justify-center"></div>
        </template>
    </div>
    
    {{-- Grid Days --}}
    <div class="grid grid-cols-7 gap-1">
        <template x-for="(dayObj, index) in calendarDays" :key="index">
            <div class="flex justify-center w-full">
                <template x-if="!dayObj.disabled">
                    <button 
                        @click="selectDate(dayObj)"
                        type="button"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-primary/50 relative z-10"
                        :class="{
                            'bg-primary text-primary-foreground': isSelected(dayObj),
                            'bg-primary/10 text-primary': isInRange(dayObj),
                            'hover:bg-background-100 dark:hover:bg-background-800 text-foreground': !isSelected(dayObj) && !isInRange(dayObj),
                            'text-primary font-bold': isToday(dayObj) && !isSelected(dayObj) && !isInRange(dayObj)
                        }"
                        x-text="dayObj.day"
                    ></button>
                </template>
                 <template x-if="dayObj.disabled">
                    <div class="w-8 h-8 flex items-center justify-center text-sm text-foreground/20 cursor-not-allowed">
                        <span x-text="dayObj.day"></span>
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>