@use('deokon\Plume\Form')
{{--
@component x-plume::form.combobox
@description Searchable dropdown for selecting from a list of options.
--}}
@props([
    'label' => null,
    'name' => null,
    'id' => null,
    'model' => null,
    'placeholder' => 'Select an option...',
    'options' => [], // Array of ['value' => '...', 'label' => '...']
    'emptyMessage' => 'No results found.',
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
            search: '',
            value: null,
            options: {{ json_encode($options) }},
            filteredOptions: [],
            activeIndex: -1,
            init() {
                this.filteredOptions = this.options;
                
                @if($model)
                    // Sync with parent Alpine data if available
                    if (typeof $data.{{ $model }} !== 'undefined') {
                         this.$watch('value', val => $data.{{ $model }} = val);
                         this.$watch('$data.{{ $model }}', val => this.value = val);
                         this.value = $data.{{ $model }};
                    }
                @endif

                this.$watch('search', () => {
                    this.filterOptions();
                    this.activeIndex = -1;
                    if (this.search !== '') {
                        this.open = true;
                    }
                });
            },
            get selectedLabel() {
                const opt = this.options.find(o => o.value == this.value);
                return opt ? opt.label : '';
            },
            filterOptions() {
                if (this.search === '') {
                    this.filteredOptions = this.options;
                } else {
                    this.filteredOptions = this.options.filter(opt =>
                        String(opt.label).toLowerCase().includes(this.search.toLowerCase())
                    );
                }
            },
            select(option) {
                this.value = option.value;
                this.search = '';
                this.open = false;
                this.activeIndex = -1;
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
                    this.activeIndex = (this.activeIndex - 1 + this.filteredOptions.length) % this.filteredOptions.length;
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
            }
        }"
        class="relative"
        @click.away="open = false"
        @keydown="onKeydown"
    >
        {{-- Hidden Input for Form Submission --}}
        <input type="hidden" name="{{ $name }}" :value="value">

        {{-- Trigger / Input --}}
        <div class="relative">
            <input
                x-ref="searchInput"
                type="text"
                id="{{ $id }}"
                class="{{ $classes }} pr-10 cursor-default"
                :class="selectedLabel ? 'placeholder:text-foreground' : 'placeholder:text-foreground/30'"
                :placeholder="selectedLabel || '{{ $placeholder }}'"
                x-model="search"
                @focus="open = true"
                @click="open = true"
                autocomplete="off"
            >
             <div 
                class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-foreground/40 hover:text-foreground/70"
                @click="toggle"
             >
                <x-plume::icon i="icon-[fluent--chevron-up-down-24-regular]" class="size-5" />
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
            class="absolute z-50 w-full mt-1 bg-background border border-background-700/40 dark:border-background-400/20 rounded-lg shadow-lg overflow-hidden"
            style="display: none;"
        >
            <ul x-ref="list" class="max-h-60 overflow-y-auto p-1">
                <template x-for="(option, index) in filteredOptions" :key="option.value">
                    <li
                        @click="select(option)"
                        @mouseenter="activeIndex = index"
                        class="px-3 py-2 text-sm rounded-md cursor-pointer transition-colors flex items-center justify-between"
                        :class="{
                            'bg-primary text-primary-foreground': value == option.value,
                            'bg-background-100 dark:bg-background-800': activeIndex === index && value != option.value,
                            'text-foreground/80': value != option.value
                        }"
                    >
                        <span x-text="option.label"></span>
                        <x-plume::icon x-show="value == option.value" i="icon-[fluent--checkmark-24-regular]" class="size-4 opacity-70" />
                    </li>
                </template>
                <div x-show="filteredOptions.length === 0" class="px-3 py-4 text-sm text-foreground/40 text-center">
                    {{ $emptyMessage }}
                </div>
            </ul>
        </div>
    </div>
</x-plume::form.element>