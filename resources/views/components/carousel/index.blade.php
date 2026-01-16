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

<div
    x-data="{
        activeSlide: 0,
        slideCount: 0,
        autoplayInterval: null,
        
        init() {
            // Wait for children to render
            this.$nextTick(() => {
                this.slideCount = this.$refs.content.children.length;
                this.updateActive();
            });
            
            @if($autoplay)
            this.startAutoplay();
            this.$el.addEventListener('mouseenter', () => this.stopAutoplay());
            this.$el.addEventListener('mouseleave', () => this.startAutoplay());
            @endif
        },
        
        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.next();
            }, {{ $interval }});
        },
        
        stopAutoplay() {
            clearInterval(this.autoplayInterval);
        },
        
        updateActive() {
            const scrollLeft = this.$refs.content.scrollLeft;
            const width = this.$refs.content.offsetWidth;
            // Handle division by zero
            if (width > 0) {
                this.activeSlide = Math.round(scrollLeft / width);
            }
        },
        
        scrollTo(index) {
            const width = this.$refs.content.offsetWidth;
            this.$refs.content.scrollTo({ left: width * index, behavior: 'smooth' });
        },
        
        next() {
            if (this.activeSlide >= this.slideCount - 1) {
                this.scrollTo(0);
            } else {
                this.scrollTo(this.activeSlide + 1);
            }
        },
        
        prev() {
            if (this.activeSlide <= 0) {
                this.scrollTo(this.slideCount - 1);
            } else {
                this.scrollTo(this.activeSlide - 1);
            }
        }
    }"
    class="relative group w-full overflow-hidden rounded-xl"
>
    {{-- Slides --}}
    <div 
        x-ref="content"
        @scroll.debounce.50ms="updateActive"
        class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide w-full"
        style="scrollbar-width: none; -ms-overflow-style: none;"
    >
        {{ $slot }}
    </div>
    
    {{-- Controls --}}
    @if($controls)
        <button 
            @click="prev" 
            class="absolute top-1/2 left-4 -translate-y-1/2 p-2 rounded-full bg-background/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background text-foreground/80 z-10"
            aria-label="Previous slide"
        >
            <x-plume::icon i="icon-[fluent--chevron-left-24-regular]" class="size-6" />
        </button>
        <button 
            @click="next" 
            class="absolute top-1/2 right-4 -translate-y-1/2 p-2 rounded-full bg-background/80 backdrop-blur-sm shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-background text-foreground/80 z-10"
            aria-label="Next slide"
        >
            <x-plume::icon i="icon-[fluent--chevron-right-24-regular]" class="size-6" />
        </button>
    @endif
    
    {{-- Indicators --}}
    @if($indicators)
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="i in slideCount">
                <button 
                    @click="scrollTo(i - 1)" 
                    class="w-2 h-2 rounded-full transition-all bg-background shadow-sm"
                    :class="activeSlide === i - 1 ? 'w-6 bg-primary' : 'hover:bg-primary/50 opacity-50'"
                    :aria-label="'Go to slide ' + i"
                ></button>
            </template>
        </div>
    @endif
</div>
