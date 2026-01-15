{{--
@component x-plume::pagination
@description Displays a sequence of links for navigating through a series of related pages. Powered by AlpineJS.
--}}
@props([
    'total' => 1,
    'current' => 1,
    'onEachSide' => 1,
])

<nav 
    x-data="{
        total: {{ $total }},
        current: {{ $current }},
        onEachSide: {{ $onEachSide }},
        
        get pages() {
            if (this.total <= 7) return Array.from({length: this.total}, (_, i) => i + 1);
            let p = [1];
            if (this.current > this.onEachSide + 2) p.push('...');
            let start = Math.max(2, this.current - this.onEachSide);
            let end = Math.min(this.total - 1, this.current + this.onEachSide);
            for (let i = start; i <= end; i++) p.push(i);
            if (this.current < this.total - (this.onEachSide + 1)) p.push('...');
            p.push(this.total);
            return p;
        },
        next() { if (this.current < this.total) this.dispatch(this.current + 1) },
        prev() { if (this.current > 1) this.dispatch(this.current - 1) },
        dispatch(page) {
            if (page === '...') return;
            this.$dispatch('change', { page: page });
        }
    }"
    x-init="
        $watch('$el.getAttribute(\'total\')', val => total = parseInt(val));
        $watch('$el.getAttribute(\'current\')', val => current = parseInt(val));
    "
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
        <template x-for="(page, index) in pages" :key="index">
            <div class="flex items-center">
                <template x-if="page === '...'">
                    <span class="flex size-8 items-center justify-center text-sm text-foreground/50">
                        <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]" class="size-4" />
                    </span>
                </template>
                <template x-if="page !== '...'">
                    <x-plume::button
                        style="ghost"
                        size="sm"
                        @click="dispatch(page)"
                        ::class="page == current ? 'bg-primary text-primary-foreground hover:bg-primary-800 hover:text-primary-foreground' : ''"
                        ::aria-label="'Page ' + page"
                        ::aria-current="page == current ? 'page' : 'false'"
                    >
                        <span x-text="page"></span>
                    </x-plume::button>
                </template>
            </div>
        </template>
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