{{--
@component x-plume::pagination
@description Displays a sequence of links for navigating through a series of related pages. Powered by AlpineJS.
--}}
<nav x-data="pagination({{ $initialTotal }}, {{ $initialCurrent }}, {{ $onEachSide }})"
    {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }}
    aria-label="Pagination" :total="{{ is_numeric($total) ? $total : '0' }}"
    :current="{{ is_numeric($current) ? $current : '1' }}">
    {{-- Previous Page --}}
    <x-plume::button style="ghost" size="sm" ::disabled="current <= 1" @click="dispatch(current - 1)"
        aria-label="Previous Page">
        <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-4" />
        <span class="hidden sm:inline-block ml-1">Previous</span>
    </x-plume::button>

    {{-- Page Numbers (Desktop) --}}
    <div class="hidden sm:flex items-center gap-1">
        <template x-for="(page, index) in pages" :key="index + '-' + page">
            <div class="flex items-center">
                <template x-if="page === '...'">
                    <span
                        class="flex size-8 items-center justify-center text-sm text-foreground/50 dark:text-background-400">
                        <x-plume::icon i="icon-[fluent--more-horizontal-24-regular]"
                            class="size-4" />
                    </span>
                </template>
                <template x-if="page !== '...'">
                    <button type="button" @click="dispatch(page)"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 size-8 hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200 cursor-pointer"
                        :class="page == current ?
                            'bg-primary text-primary-foreground hover:bg-primary-800 hover:text-primary-foreground' :
                            'text-foreground/70 dark:text-background-400'"
                        :aria-label="'Page ' + page"
                        :aria-current="page == current ? 'page' : 'false'">
                        <span x-text="page"></span>
                    </button>
                </template>
            </div>
        </template>
    </div>

    {{-- Page Info (Mobile) --}}
    <div class="sm:hidden px-4 text-sm font-medium text-foreground/70 dark:text-background-400">
        <span x-text="current"></span> / <span x-text="total"></span>
    </div>

    {{-- Next Page --}}
    <x-plume::button style="ghost" size="sm" ::disabled="current >= total" @click="dispatch(current + 1)"
        aria-label="Next Page">
        <span class="hidden sm:inline-block mr-1">Next</span>
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-4" />
    </x-plume::button>
</nav>
