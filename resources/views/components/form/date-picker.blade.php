@use('deokon\Plume\Form')
{{--
@component x-plume::form.date-picker
@description Date picker with visual calendar.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'placeholder' => 'Select a date...',
])
@php
    $name = $name ?? $model;
    $id = Form::resolveId($name, $model, $id);
    $classes = Form::inputClasses();
@endphp

<x-plume::form.element :label="$label" :name="$name" :id="$id" :model="$model" {{ $attributes->whereStartsWith('class') }}>
    <div
        x-data="{
            open: false,
            value: null,
            init() {
                 @if($model)
                    if (typeof $data.{{ $model }} !== 'undefined') {
                         this.$watch('value', val => $data.{{ $model }} = val);
                         this.$watch('$data.{{ $model }}', val => this.value = val);
                         this.value = $data.{{ $model }};
                    }
                @endif
            },
            toggle() { this.open = !this.open; },
            close() { this.open = false; },
            onDateChange(date) {
                // value is updated via x-model
                this.close();
            }
        }"
        class="relative"
        @click.away="close"
    >
        {{-- Hidden Input --}}
        <input type="hidden" name="{{ $name }}" :value="value">
        
        {{-- Trigger --}}
        <div class="relative">
            <input
                type="text"
                id="{{ $id }}"
                readonly
                class="{{ $classes }} pl-10 cursor-pointer"
                :class="value ? 'placeholder:text-foreground' : 'placeholder:text-foreground/30'"
                :placeholder="value || '{{ $placeholder }}'"
                x-model="value"
                @click="toggle"
            >
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-foreground/40">
                <x-plume::icon i="icon-[fluent--calendar-ltr-24-regular]" class="size-5" />
            </div>
        </div>
        
        {{-- Dropdown --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-1 bg-background border border-background-700/40 dark:border-background-400/20 rounded-xl shadow-lg"
            style="display: none;"
        >
            <x-plume::calendar 
                x-model="value"
                @change="onDateChange($event.detail)"
                class="border-0 shadow-none"
            />
        </div>
    </div>
</x-plume::form.element>
