{{--
@component x-plume::search
@description Styled search input with an integrated results dropdown.
@prop string $placeholder (Default: 'Search...')
@prop string $model (Default: null)
@prop string $onSelect (Default: null)
--}}
<div x-data="search({ onSelect: {{ Js::from($onSelect) }} })" 
    @if ($model) x-init="query = $wire.entangle('{{ $model }}')" @endif
    class="relative w-full" @click.away="open = false"
    @plume-search-select.stop="handleSelect($event.detail)">
    {{-- Search Input --}}
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <x-plume::icon i="icon-[fluent--search-24-regular]" class="size-5 text-foreground/40" />
        </div>
        <input type="text" x-model="query" @focus="open = true" @input="open = true"
            class="block w-full pl-10 pr-3 py-2 border border-background-700/40 dark:border-background-400/20 rounded-lg bg-background placeholder:text-foreground/30 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all sm:text-sm"
            placeholder="{{ $placeholder }}">
        <div x-show="query.length > 0" x-cloak
            class="absolute inset-y-0 right-0 flex items-center pr-3">
            <button @click="query = ''; open = false"
                class="text-foreground/30 hover:text-foreground/60">
                <x-plume::icon i="icon-[fluent--dismiss-circle-24-filled]" class="size-4" />
            </button>
        </div>
    </div>

    {{-- Results Dropdown --}}
    <div x-show="open && query.length > 0" x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="absolute z-50 w-full mt-2 bg-background border border-background-700/40 dark:border-background-400/20 rounded-xl shadow-xl overflow-hidden">
        <div class="max-h-96 overflow-y-auto p-2">
            {{ $results ?? $slot }}
        </div>
    </div>
</div>