{{--
@component x-plume::pagination
@description Displays a sequence of links for navigating through a series of related pages.
@prop {number} total - Total number of pages. (Default: 1)
@prop {number} current - The current active page. (Default: 1)
--}}
@props([
    'total' => 1,
    'current' => 1,
])

<nav {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }} aria-label="Pagination">
    <x-plume::button
        style="ghost"
        size="sm"
        :disabled="$current <= 1"
        aria-label="Previous Page"
    >
        <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-4" />
    </x-plume::button>

    @for($i = 1; $i <= $total; $i++)
        <x-plume::button
            :style="$i === $current ? 'default' : 'ghost'"
            size="sm"
            aria-label="Page {{ $i }}"
            aria-current="{{ $i === $current ? 'page' : 'false' }}"
        >
            {{ $i }}
        </x-plume::button>
    @endfor

    <x-plume::button
        style="ghost"
        size="sm"
        :disabled="$current >= $total"
        aria-label="Next Page"
    >
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-4" />
    </x-plume::button>
</nav>
