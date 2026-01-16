{{--
@component x-plume::calendar
@description A visual calendar interface for selecting dates.
--}}
@props([
    'model' => null,
    'value' => null,
])

<div
    x-data="{
        value: @if($value) '{{ $value }}' @else null @endif,
        selectedDate: null,
        currDate: new Date(),
        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        
        init() {
            if (this.value) {
                // Handle YYYY-MM-DD
                const parts = this.value.split('-');
                if(parts.length === 3) {
                     this.selectedDate = new Date(parts[0], parts[1] - 1, parts[2]);
                     this.currDate = new Date(this.selectedDate);
                } else {
                     this.selectedDate = new Date(this.value);
                     this.currDate = new Date(this.selectedDate);
                }
            }
            
             @if($model)
                if (typeof $data.{{ $model }} !== 'undefined') {
                     this.$watch('selectedDate', val => {
                         if(val) {
                             // Format YYYY-MM-DD local time
                             const offset = val.getTimezoneOffset();
                             const localDate = new Date(val.getTime() - (offset*60*1000));
                             $data.{{ $model }} = localDate.toISOString().split('T')[0];
                         }
                     });
                     
                     if ($data.{{ $model }}) {
                         this.value = $data.{{ $model }};
                         const parts = this.value.split('-');
                         if(parts.length === 3) {
                             this.selectedDate = new Date(parts[0], parts[1] - 1, parts[2]);
                             this.currDate = new Date(this.selectedDate);
                         }
                     }
                }
            @endif
        },
        
        get year() { return this.currDate.getFullYear(); },
        get month() { return this.currDate.getMonth(); },
        get monthName() { return this.monthNames[this.month]; },
        
        get calendarDays() {
            const daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
            const firstDayIndex = new Date(this.year, this.month, 1).getDay();
            
            let days = [];
            // Previous month padding
            for (let i = 0; i < firstDayIndex; i++) {
                days.push({ day: '', disabled: true });
            }
            // Current month days
            for (let i = 1; i <= daysInMonth; i++) {
                days.push({ day: i, disabled: false, date: new Date(this.year, this.month, i) });
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
            this.selectedDate = day.date;
            
            const offset = day.date.getTimezoneOffset();
            const localDate = new Date(day.date.getTime() - (offset*60*1000));
            this.value = localDate.toISOString().split('T')[0];
            
            this.$dispatch('change', this.value);
            // Also dispatch input for v-model support if wrapper uses it
            this.$dispatch('input', this.value);
        },
        
        isSelected(day) {
            if (!this.selectedDate || day.disabled) return false;
            return day.date.toDateString() === this.selectedDate.toDateString();
        },
        
        isToday(day) {
            if (day.disabled) return false;
            return day.date.toDateString() === new Date().toDateString();
        }
    }"
    x-modelable="value"
    {{ $attributes->merge(['class' => 'w-full max-w-[280px] bg-background border border-background-700/40 dark:border-background-400/20 rounded-xl shadow-sm p-4']) }}
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
            <div class="flex justify-center">
                <template x-if="!dayObj.disabled">
                    <button 
                        @click="selectDate(dayObj)"
                        type="button"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-primary/50"
                        :class="{
                            'bg-primary text-primary-foreground': isSelected(dayObj),
                            'hover:bg-background-100 dark:hover:bg-background-800 text-foreground': !isSelected(dayObj),
                            'text-primary font-bold': isToday(dayObj) && !isSelected(dayObj)
                        }"
                        x-text="dayObj.day"
                    ></button>
                </template>
                 <template x-if="dayObj.disabled">
                    <div class="w-8 h-8"></div>
                </template>
            </div>
        </template>
    </div>
</div>
