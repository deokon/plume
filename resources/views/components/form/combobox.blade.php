@props([
    'label' => null,
    'model' => null,
    'placeholder' => 'Select an option...',
    'options' => [], // Array of ['value' => '...', 'label' => '...']
])

<x-plume::form.element :label="$label" :model="$model" {{ $attributes->only('class') }}>
    <div 
        x-data="{ 
            open: false,
            search: '',
            value: null,
            localOptions: [],
            get filteredOptions() {
                if (this.search === '') return this.localOptions;
                return this.localOptions.filter(opt => 
                    String(opt.label).toLowerCase().includes(this.search.toLowerCase())
                );
            },
            get selectedLabel() {
                const opt = this.localOptions.find(o => o.value == this.value);
                return opt ? opt.label : '';
            },
            select(option) {
                this.value = option.value;
                @if($model) 
                    if (typeof $data.{{ $model }} !== 'undefined') {
                        $data.{{ $model }} = option.value;
                    }
                @endif
                this.search = '';
                this.open = false;
            }
        }"
        x-init="
            localOptions = $data.options || {{ json_encode($options) }};
            @if($model)
                if (typeof $data.{{ $model }} !== 'undefined') {
                    $watch('$data.{{ $model }}', val => value = val);
                    value = $data.{{ $model }};
                }
            @endif
            $watch('open', val => { if(val) $nextTick(() => $refs.searchInput.focus()) })
        "
        class="relative"
        @click.away="open = false"
    >
        {{-- Input --}}
        <div class="relative">
            <input 
                x-ref="searchInput"
                type="text" 
                class="block w-full pl-3 pr-10 py-2 border border-background-700/40 dark:border-background-400/20 rounded-lg bg-background focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all sm:text-sm cursor-default"
                :class="selectedLabel ? 'placeholder:text-foreground' : 'placeholder:text-foreground/30'"
                :placeholder="selectedLabel || '{{ $placeholder }}'"
                @focus="open = true"
                x-model="search"
                @input="open = true"
            >
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <x-plume::icon i="icon-[fluent--chevron-up-down-24-regular]" class="size-5 text-foreground/40" />
            </div>
        </div>

        {{-- Dropdown --}}
        <div 
            x-show="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="absolute z-50 w-full mt-1 bg-background border border-background-700/40 dark:border-background-400/20 rounded-lg shadow-lg overflow-hidden"
            style="display: none;"
        >
            <ul class="max-h-60 overflow-y-auto p-1">
                <template x-for="option in filteredOptions" :key="option.value">
                    <li 
                        @click="select(option)"
                        class="px-3 py-2 text-sm rounded-md cursor-pointer transition-colors"
                        :class="value == option.value ? 'bg-primary text-primary-foreground' : 'hover:bg-background-100 dark:hover:bg-background-800 text-foreground/80'"
                    >
                        <span x-text="option.label"></span>
                    </li>
                </template>
                <div x-show="filteredOptions.length === 0" class="px-3 py-2 text-sm text-foreground/40 text-center py-4">
                    No results found.
                </div>
            </ul>
        </div>
    </div>
</x-plume::form.element>
