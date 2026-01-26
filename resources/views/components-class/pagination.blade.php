{{--
@component x-plume::pagination
@description A standalone pagination component that dispatches events on change.
@prop int $total (Default: 1) Total number of pages.
@prop int $current (Default: 1) Currently active page.
@prop int $onEachSide (Default: 1) Number of page links to show on each side of the current page.
@usage
{{-- Simple Usage --}}
<x-plume::pagination :total="10" :current="1" />

{{-- Listening for changes in AlpineJS --}}
<div x-data="{ page: 1 }">
    <x-plume::pagination 
        :total="20" 
        x-bind:data-current="page" 
        @plume-page-change="page = $event.detail.page; fetchNewData()" 
    />
</div>
--}}
@php $pagination = $component; @endphp
<nav x-data="pagination({{ $initialTotal }}, {{ $initialCurrent }}, {{ $onEachSide }})"
    {{ $attributes->merge(['class' => 'flex items-center justify-center gap-1']) }}
    aria-label="Pagination" data-total="{{ $initialTotal }}" data-current="{{ $initialCurrent }}">
    {{-- Previous Page --}}
    @php $pagination = $component; @endphp
    <x-plume::button style="ghost" size="sm" ::disabled="current <= 1" @click="dispatch(current - 1)"
        aria-label="Previous Page">
        <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-4" />
        <span class="hidden sm:inline-block ml-1">Previous</span>
    </x-plume::button>

    {{-- Page Numbers (Desktop) --}}
    @php $pagination = $component; @endphp
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
    @php $pagination = $component; @endphp
    <div class="sm:hidden px-4 text-sm font-medium text-foreground/70 dark:text-background-400">
        <span x-text="current"></span> / <span x-text="total"></span>
    </div>

    {{-- Next Page --}}
    @php $pagination = $component; @endphp
    <x-plume::button style="ghost" size="sm" ::disabled="current >= total" @click="dispatch(current + 1)"
        aria-label="Next Page">
        <span class="hidden sm:inline-block mr-1">Next</span>
        <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-4" />
    </x-plume::button>
</nav>
