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

<div x-data="calendar(
    @if ($value) {{ $mode === 'range' ? json_encode($value) : "'$value'" }} @else {{ $mode === 'range' ? '[]' : 'null' }} @endif,
    '{{ $mode }}',
    '{{ $min }}',
    '{{ $max }}',
    '{{ $model }}'
)" x-modelable="value"
    {{ $attributes->merge(['class' => 'w-full max-w-[280px] bg-background dark:bg-background-800 border border-background-700/40 dark:border-background-400/20 rounded-xl shadow-sm p-4']) }}>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-4">
        <button @click="prevMonth" type="button"
            class="p-1 hover:bg-background-100 dark:hover:bg-background-800 dark:text-background-200 rounded-full transition-colors text-foreground/70">
            <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-5" />
        </button>
        <div class="font-semibold text-sm">
            <span x-text="monthName"></span> <span x-text="year"></span>
        </div>
        <button @click="nextMonth" type="button"
            class="p-1 hover:bg-background-100 dark:hover:bg-background-800 dark:text-background-200 rounded-full transition-colors text-foreground/70">
            <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-5" />
        </button>
    </div>

    {{-- Grid Headers --}}
    <div class="grid grid-cols-7 gap-1 text-center mb-2">
        <template x-for="day in days">
            <div x-text="day"
                class="text-xs font-medium text-foreground/50 dark:text-background-200/50 h-8 flex items-center justify-center">
            </div>
        </template>
    </div>

    {{-- Grid Days --}}
    <div class="grid grid-cols-7 gap-1">
        <template x-for="(dayObj, index) in calendarDays" :key="index">
            <div class="flex justify-center w-full">
                <template x-if="!dayObj.disabled">
                    <button @click="selectDate(dayObj)" type="button"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-sm transition-colors focus:outline-none focus:ring-2 focus:ring-primary/50 relative z-10"
                        :class="{
                            'bg-primary text-primary-foreground': isSelected(dayObj),
                            'bg-primary/10 text-primary': isInRange(dayObj),
                            'hover:bg-background-100 dark:hover:bg-background-800 text-foreground dark:text-background-200':
                                !isSelected(dayObj) && !isInRange(dayObj),
                            'text-primary dark:text-primary font-bold': isToday(dayObj) && !
                                isSelected(dayObj) && !isInRange(dayObj)
                        }"
                        x-text="dayObj.day"></button>
                </template>
                <template x-if="dayObj.disabled">
                    <div
                        class="w-8 h-8 flex items-center justify-center text-sm text-foreground/20 dark:text-background-200/50 cursor-not-allowed">
                        <span x-text="dayObj.day"></span>
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>
