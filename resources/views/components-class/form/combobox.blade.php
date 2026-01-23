{{--
@component x-plume::form.combobox
@description A searchable select input.
@prop string $label (Default: null)
@prop string $name (Default: null)
@prop string $id (Default: null)
@prop string $model (Default: null)
@prop array $options (Default: [])
@prop string $placeholder (Default: 'Select option...')
@prop string $emptyMessage (Default: 'No results found.')
--}}
@aware(['groupName' => null, 'groupModel' => null])
@php
    [$resolvedName, $resolvedModel, $resolvedId] = $component->resolveFormAttributes($attributes->all(), $groupName, $groupModel);
    
    // Ensure options are in [{value, label}] format if they are simple [val => lab]
    $formattedOptions = collect($options)->map(function($label, $value) {
        if (is_array($label) && isset($label['value'])) return $label;
        return ['value' => $value, 'label' => $label];
    })->values()->toArray();
@endphp
<x-plume::form.element :label="$label ?? $slot" :name="$resolvedName" :id="$resolvedId" :model="$resolvedModel">
    <div x-data="combobox({{ json_encode($formattedOptions) }}, '{{ $resolvedModel }}', { emptyMessage: '{{ $component->emptyMessage }}' })" 
         class="relative"
         @keydown="onKeydown($event)">
        <button type="button" @click="toggle()" id="{{ $resolvedId }}"
            role="combobox" aria-haspopup="listbox" :aria-expanded="open"
            :aria-invalid="hasError('{{ $resolvedModel }}')"
            :aria-describedby="hasError('{{ $resolvedModel }}') ? '{{ $resolvedId }}-error' : null"
            class="relative w-full cursor-default rounded-md bg-background py-2 pl-3 pr-10 text-left border border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary sm:text-sm transition-all"
            {{ $attributes->except(['name', 'model', 'id']) }}>
            <span class="block truncate text-foreground"
                x-text="selectedLabel || '{{ $placeholder }}'"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <x-plume::icon i="icon-[fluent--chevron-up-down-24-regular]"
                    class="h-5 w-5 text-foreground/40" />
            </span>
        </button>

        <div x-show="open" @click.away="open = false" x-cloak
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-background py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm border border-background-700/40 dark:border-background-400/20">
            <div class="px-2 py-2 sticky top-0 bg-background border-b border-background-700/40">
                <input type="text" x-model="search" x-ref="searchInput"
                    class="w-full bg-transparent border-none focus:ring-0 text-sm p-1 text-foreground"
                    placeholder="Search...">
            </div>
            <ul class="pt-1" x-ref="list">
                <template x-for="(option, index) in filteredOptions" :key="option.value">
                    <li @click="select(option)"
                        class="relative cursor-default select-none py-2 pl-3 pr-9 text-foreground hover:bg-primary hover:text-primary-foreground transition-colors"
                        :class="{ 
                            'bg-primary text-primary-foreground': value == option.value,
                            'bg-background-100 dark:bg-background-700': activeIndex === index 
                        }">
                        <span class="block truncate" x-text="option.label"></span>
                        <span x-show="value == option.value"
                            class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <x-plume::icon i="icon-[fluent--checkmark-24-regular]" class="h-5 w-5" />
                        </span>
                    </li>
                </template>
                <div x-show="filteredOptions.length === 0" class="px-3 py-2 text-sm text-foreground/50" x-text="emptyMessage">
                </div>
            </ul>
        </div>
    </div>
</x-plume::form.element>
