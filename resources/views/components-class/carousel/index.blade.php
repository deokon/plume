{{--
@component x-plume::carousel
@description A slideshow component for cycling through elements like a gallery of images or cards.
@prop bool $autoplay (Default: false) Whether the carousel should automatically cycle through slides.
@prop int $interval (Default: 3000) The time delay between slides in milliseconds when autoplay is enabled.
@prop string $model (Default: null) AlpineJS model name for the active slide index.
@prop string $onSlideChange (Default: null) AlpineJS expression or function to call when the active slide changes.
@usage
<x-plume::carousel :autoplay="true" :interval="5000" model="currentSlide">
    <x-plume::carousel.item>
        Slide 1 content...
    </x-plume::carousel.item>
    <x-plume::carousel.item>
        Slide 2 content...
    </x-plume::carousel.item>
</x-plume::carousel>
--}}
@php
    $resolvedModel = $model;
    if ($model && !str_contains($model, '.') && !str_starts_with($model, 'data.')) {
        $resolvedModel = 'data.' . $model;
    }
@endphp
<div x-data="carousel({{ $autoplay ? 'true' : 'false' }}, {{ $interval }}, {{ $resolvedModel ? "'$resolvedModel'" : 'null' }}, { onSlideChange: {{ $onSlideChange ? Js::from($onSlideChange) : 'null' }} })" class="relative group w-full overflow-hidden rounded-xl">
    <div class="flex snap-x snap-mandatory overflow-x-auto scroll-smooth [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden" x-ref="content"
        @scroll.debounce.100ms="updateActive()">
        {{ $slot }}
    </div>

    {{-- Controls --}}
    @if (isset($controls) && $controls)
        <button @click="prev" dusk="prev-slide"
            class="absolute top-1/2 left-4 -translate-y-1/2 p-2 rounded-full bg-background/80 dark:bg-background-800/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background dark:hover:bg-background-700 text-foreground/80 dark:text-background-200 z-10"
            aria-label="Previous slide">
            <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-6" />
        </button>
        <button @click="next" dusk="next-slide"
            class="absolute top-1/2 right-4 -translate-y-1/2 p-2 rounded-full bg-background/80 dark:bg-background-800/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background dark:hover:bg-background-700 text-foreground/80 dark:text-background-200 z-10"
            aria-label="Next slide">
            <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-6" />
        </button>
    @endif

    {{-- Indicators --}}
    @if (isset($indicators) && $indicators)
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
