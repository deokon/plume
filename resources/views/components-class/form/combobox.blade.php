{{--
@component x-plume::form.combobox
--}}
<x-plume::form.element :label="$label ?? $slot" :name="$name" :id="$id" :model="$model">
    <div x-data="{
        open: false,
        search: '',
        options: {{ json_encode($options) }},
        get filteredOptions() {
            if (this.search === '') return this.options;
            return Object.entries(this.options).reduce((acc, [key, value]) => {
                if (value.toLowerCase().includes(this.search.toLowerCase())) {
                    acc[key] = value;
                }
                return acc;
            }, {});
        }
    }" class="relative">
        <button type="button" @click="open = !open" id="{{ $id }}"
            class="relative w-full cursor-default rounded-md bg-background py-2 pl-3 pr-10 text-left border border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary sm:text-sm transition-all">
            <span class="block truncate text-foreground"
                x-text="options[{{ $model }}] || '{{ $placeholder }}'"></span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <x-plume::icon i="icon-[fluent--chevron-up-down-24-regular]"
                    class="h-5 w-5 text-foreground/40" />
            </span>
        </button>

        <div x-show="open" @click.away="open = false" x-cloak
            class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-background py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm border border-background-700/40 dark:border-background-400/20">
            <div class="px-2 py-2 sticky top-0 bg-background border-b border-background-700/40">
                <input type="text" x-model="search"
                    class="w-full bg-transparent border-none focus:ring-0 text-sm p-1 text-foreground"
                    placeholder="Search...">
            </div>
            <ul class="pt-1">
                <template x-for="(label, val) in filteredOptions" :key="val">
                    <li @click="{{ $model }} = val; open = false"
                        class="relative cursor-default select-none py-2 pl-3 pr-9 text-foreground hover:bg-primary hover:text-primary-foreground transition-colors"
                        :class="{ 'bg-primary text-primary-foreground': {{ $model }} == val }">
                        <span class="block truncate" x-text="label"></span>
                        <span x-show="{{ $model }} == val"
                            class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <x-plume::icon i="icon-[fluent--checkmark-24-regular]" class="h-5 w-5" />
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</x-plume::form.element>
