{{--
@component x-plume::carousel
@description A slideshow component for cycling through elements.
--}}
@props([
    'controls' => true,
    'indicators' => false,
    'autoplay' => false,
    'interval' => 5000,
])

<div x-data="carousel({{ $autoplay ? 'true' : 'false' }}, {{ $interval }})" class="relative group w-full overflow-hidden rounded-xl">
    {{-- Slides --}}
    <div x-ref="content" @scroll.debounce.50ms="updateActive"
        class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide w-full"
        style="scrollbar-width: none; -ms-overflow-style: none;">
        {{ $slot }}
    </div>

    {{-- Controls --}}
    @if ($controls)
        <button @click="prev"
            class="absolute top-1/2 left-4 -translate-y-1/2 p-2 rounded-full bg-background/80 dark:bg-background-800/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background dark:hover:bg-background-700 text-foreground/80 dark:text-background-200 z-10"
            aria-label="Previous slide">
            <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-6" />
        </button>
        <button @click="next"
            class="absolute top-1/2 right-4 -translate-y-1/2 p-2 rounded-full bg-background/80 dark:bg-background-800/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background dark:hover:bg-background-700 text-foreground/80 dark:text-background-200 z-10"
            aria-label="Next slide">
            <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-6" />
        </button>
    @endif

    {{-- Indicators --}}
    @if ($indicators)
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="i in slideCount">
                <button @click="scrollTo(i - 1)"
                    class="w-2 h-2 rounded-full transition-all bg-background dark:bg-background-400 shadow-sm"
                    :class="activeSlide === i - 1 ? 'w-6 bg-primary dark:bg-primary-400' :
                        'hover:bg-primary/50 dark:hover:bg-primary-400/50 opacity-50'"
                    :aria-label="'Go to slide ' + i"></button>
            </template>
        </div>
    @endif
</div>
