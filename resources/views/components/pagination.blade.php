{{--
@component x-plume::pagination
@description Displays a sequence of links for navigating through a series of related pages.
--}}
@props([
    'total' => 1,
    'current' => 1,
    'url' => null,
    'route' => null,
    'onEachSide' => 1,
])

@php
    $getPageUrl = function($page) use ($url, $route) {
        if ($page === '...') return null;
        if ($route) return route($route, ['page' => $page]);
        if ($url) return str_replace(':page', $page, $url);
        return null;
    };

    $pages = [];
    if ($total <= 7) {
        $pages = range(1, $total);
    } else {
        $pages[] = 1;
        if ($current > $onEachSide + 2) {
            $pages[] = '...';
        }

        $start = max(2, $current - $onEachSide);
        $end = min($total - 1, $current + $onEachSide);

        for ($i = $start; $i <= $end; $i++) {
            $pages[] = $i;
        }

        if ($current < $total - ($onEachSide + 1)) {
            $pages[] = '...';
        }

        $pages[] = $total;
    }
@endphp

<nav 
    x-data 
    {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }} 
    aria-label="Pagination"
>
    {{-- Previous Page --}}
    @php $prevUrl = $current > 1 ? $getPageUrl($current - 1) : null; @endphp
    <x-plume::button
        style="ghost"
        size="sm"
        :disabled="$current <= 1"
        :href="$prevUrl"
        @click="$dispatch('change', { page: {{ $current - 1 }} })"
        aria-label="Previous Page"
    >
        <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-4" />
        <span class="hidden sm:inline-block ml-1">Previous</span>
    </x-plume::button>

    {{-- Page Numbers (Desktop) --}}
    <div class="hidden sm:flex items-center gap-1">
        @foreach($pages as $page)
            @if($page === '...')
                <span class="flex size-8 items-center justify-center text-sm text-foreground/50">
                    <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]" class="size-4" />
                </span>
            @else
                <x-plume::button
                    :style="$page === $current ? 'default' : 'ghost'"
                    size="sm"
                    :href="$getPageUrl($page)"
                    @click="$dispatch('change', { page: {{ $page }} })"
                    aria-label="Page {{ $page }}"
                    aria-current="{{ $page === $current ? 'page' : 'false' }}"
                >
                    {{ $page }}
                </x-plume::button>
            @endif
        @endforeach
    </div>

    {{-- Page Info (Mobile) --}}
    <div class="sm:hidden px-4 text-sm font-medium">
        {{ $current }} / {{ $total }}
    </div>

    {{-- Next Page --}}
    @php $nextUrl = $current < $total ? $getPageUrl($current + 1) : null; @endphp
    <x-plume::button
        style="ghost"
        size="sm"
        :disabled="$current >= $total"
        :href="$nextUrl"
        @click="$dispatch('change', { page: {{ $current + 1 }} })"
        aria-label="Next Page"
    >
        <span class="hidden sm:inline-block mr-1">Next</span>
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-4" />
    </x-plume::button>
</nav>
