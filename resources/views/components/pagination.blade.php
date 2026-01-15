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
    $isStatic = is_numeric($total) && is_numeric($current);
    
    $getPageUrl = function($page) use ($url, $route) {
        if ($page === '...') return null;
        if ($route) return route($route, ['page' => $page]);
        if ($url) return str_replace(':page', $page, $url);
        return null;
    };

    $staticPages = [];
    if ($isStatic) {
        if ($total <= 7) {
            $staticPages = range(1, $total);
        } else {
            $staticPages[] = 1;
            if ($current > $onEachSide + 2) $staticPages[] = '...';
            $start = max(2, $current - $onEachSide);
            $end = min($total - 1, $current + $onEachSide);
            for ($i = $start; $i <= $end; $i++) $staticPages[] = $i;
            if ($current < $total - ($onEachSide + 1)) $staticPages[] = '...';
            $staticPages[] = $total;
        }
    }
@endphp

<nav 
    x-data="{
        total: {{ $isStatic ? $total : '1' }},
        current: {{ $isStatic ? $current : '1' }},
        onEachSide: {{ $onEachSide }},
        init() {
            if (this.$el.hasAttribute('total')) {
                this.$watch('$el.getAttribute(\'total\')', val => this.total = parseInt(val));
                this.total = parseInt(this.$el.getAttribute('total')) || 1;
            }
            if (this.$el.hasAttribute('current')) {
                this.$watch('$el.getAttribute(\'current\')', val => this.current = parseInt(val));
                this.current = parseInt(this.$el.getAttribute('current')) || 1;
            }
        },
        get pages() {
            if (this.total <= 7) return Array.from({length: this.total}, (_, i) => i + 1);
            let pages = [1];
            if (this.current > this.onEachSide + 2) pages.push('...');
            let start = Math.max(2, this.current - this.onEachSide);
            let end = Math.min(this.total - 1, this.current + this.onEachSide);
            for (let i = start; i <= end; i++) pages.push(i);
            if (this.current < this.total - (this.onEachSide + 1)) pages.push('...');
            pages.push(this.total);
            return pages;
        },
        next() { if (this.current < this.total) this.dispatch(this.current + 1) },
        prev() { if (this.current > 1) this.dispatch(this.current - 1) },
        dispatch(page) {
            if (page === '...') return;
            this.current = page;
            this.$dispatch('change', { page: page });
        }
    }"
    {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }} 
    aria-label="Pagination"
>
    {{-- Previous Page --}}
    <x-plume::button
        style="ghost"
        size="sm"
        ::disabled="current <= 1"
        @click="prev()"
        aria-label="Previous Page"
    >
        <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-4" />
        <span class="hidden sm:inline-block ml-1">Previous</span>
    </x-plume::button>

    {{-- Page Numbers (Desktop) --}}
    <div class="hidden sm:flex items-center gap-1">
        @if($isStatic)
            @foreach($staticPages as $page)
                @if($page === '...')
                    <span class="flex size-8 items-center justify-center text-sm text-foreground/50">
                        <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]" class="size-4" />
                    </span>
                @else
                    <x-plume::button
                        :style="$page === $current ? 'default' : 'ghost'"
                        size="sm"
                        :href="$getPageUrl($page)"
                        @click="dispatch({{ $page }})"
                        aria-label="Page {{ $page }}"
                        aria-current="{{ $page === $current ? 'page' : 'false' }}"
                    >
                        {{ $page }}
                    </x-plume::button>
                @endif
            @endforeach
        @else
            <template x-for="page in pages" :key="page === '...' ? Math.random() : page">
                <div>
                    <template x-if="page === '...'">
                        <span class="flex size-8 items-center justify-center text-sm text-foreground/50">
                            <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]" class="size-4" />
                        </span>
                    </template>
                    <template x-if="page !== '...'">
                        <x-plume::button
                            ::style="page === current ? 'default' : 'ghost'"
                            size="sm"
                            @click="dispatch(page)"
                            ::aria-label="'Page ' + page"
                            ::aria-current="page === current ? 'page' : 'false'"
                        >
                            <span x-text="page"></span>
                        </x-plume::button>
                    </template>
                </div>
            </template>
        @endif
    </div>

    {{-- Page Info (Mobile) --}}
    <div class="sm:hidden px-4 text-sm font-medium">
        <span x-text="current"></span> / <span x-text="total"></span>
    </div>

    {{-- Next Page --}}
    <x-plume::button
        style="ghost"
        size="sm"
        ::disabled="current >= total"
        @click="next()"
        aria-label="Next Page"
    >
        <span class="hidden sm:inline-block mr-1">Next</span>
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-4" />
    </x-plume::button>
</nav>