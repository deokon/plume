{{--
@component x-plume::form.combobox
@description A searchable select input with filtering capabilities, integrated label, and validation support.
@prop string $label (Default: null) The label for the combobox.
@prop string $name (Default: null) HTML name attribute.
@prop string $id (Default: null) HTML id attribute. Auto-generated from name if not provided.
@prop string $model (Default: null) AlpineJS model name for two-way binding.
@prop array $options (Default: []) Array of options: [{value: 1, label: 'One'}] or [1 => 'One'].
@prop string $placeholder (Default: 'Select option...') Placeholder text when no value is selected.
@prop string $emptyMessage (Default: 'No results found.') Message to show when filtering returns no results.
@prop string $onSelect (Default: null) AlpineJS expression or function to call when an option is selected.
@usage
<x-plume::form.combobox 
    label="Country" 
    model="country_id" 
    :options="['US' => 'United States', 'CA' => 'Canada', 'GB' => 'United Kingdom']" 
    placeholder="Choose a country..."
    onSelect="$toast('Selected country: ' + result.label)"
/>
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    $combobox = $component;
    [$resolvedName, $resolvedModel, $resolvedId] = $combobox->resolveFormAttributes(
        $attributes->all(),
        $groupName,
        $groupModel,
    );

    // Ensure options are in [{value, label}] format if they are simple [val => lab]
    $formattedOptions = collect($options)
        ->map(function ($label, $value) {
            if (is_array($label) && isset($label['value'])) {
                return $label;
            }
            return ['value' => $value, 'label' => $label];
        })
        ->values()
        ->toArray();
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div x-data="combobox({{ json_encode($formattedOptions) }}, '{{ $resolvedModel }}', {
        emptyMessage: '{{ $combobox->emptyMessage }}',
        onSelect: {{ Js::from($onSelect) }}
    })" class="relative w-full" @keydown="onKeydown($event)">
        <button type="button" @click="toggle()" id="{{ $resolvedId }}" role="combobox"
            aria-haspopup="listbox" :aria-expanded="open"
            :aria-invalid="hasError('{{ $resolvedModel }}')"
            :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            class="relative w-full cursor-default rounded-md bg-background-50 dark:bg-background-700 py-2 pl-3 pr-10 text-left border border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary sm:text-sm transition-all shadow-sm min-h-[38px]"
            {{ $attributes->except(['name', 'model', 'id']) }}>
            <span class="block truncate"
                :class="selectedLabel ? 'text-foreground' : 'text-foreground/50 dark:text-background-400'"
                x-html="selectedLabel || '{{ $placeholder }}' || '&nbsp;'"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <x-plume::icon i="icon-[fluent--chevron-up-down-24-regular]"
                    class="h-4 w-4 text-foreground/40" />
            </span>
        </button>

        <div x-show="open" @click.away="open = false" x-cloak
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 mt-1 max-h-60 min-w-full w-max max-w-[100vw] overflow-hidden rounded-md bg-background dark:bg-background-800 text-base shadow-xl ring-1 ring-black/5 focus:outline-none sm:text-sm border border-background-700/40 dark:border-background-400/20">
            <div class="px-2 py-2 bg-background-50 dark:bg-background-900/50 border-b border-background-700/20 dark:border-background-400/10">
                <div class="relative flex items-center">
                    <x-plume::icon i="icon-[fluent--search-24-regular]" class="absolute left-2 size-3.5 text-foreground/40" />
                    <input type="text" x-model="search" x-ref="searchInput"
                        class="w-full bg-transparent border-none focus:ring-0 text-sm py-1 pl-7 pr-2 text-foreground placeholder:text-foreground/30 dark:placeholder:text-background-500"
                        placeholder="Search...">
                </div>
            </div>
            <ul class="overflow-y-auto max-h-48 p-1" x-ref="list">
                <template x-for="(option, index) in filteredOptions" :key="option.value">
                    <li @click="select(option)"
                        class="relative cursor-pointer select-none py-2 pl-3 pr-9 rounded transition-colors"
                        :class="{
                            'bg-primary text-primary-foreground': value == option.value,
                            'bg-background-100 dark:bg-background-700': activeIndex === index && value != option.value,
                            'text-foreground': value != option.value
                        }">
                        <span class="block truncate" :class="{ 'font-semibold': value == option.value }" x-text="option.label"></span>
                        <span x-show="value == option.value"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <x-plume::icon i="icon-[fluent--checkmark-24-regular]"
                                class="size-4" />
                        </span>
                    </li>
                </template>
                <div x-show="filteredOptions.length === 0"
                    class="px-3 py-4 text-center text-sm text-foreground/40 italic" x-text="emptyMessage">
                </div>
            </ul>
        </div>
    </div>
</x-plume::form.element>
