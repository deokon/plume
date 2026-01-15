{{--
@component x-plume::stepper.step
--}}
@aware([
    'orientation' => 'horizontal',
])

@props([
    'step',
    'title' => null,
    'description' => null,
])

<div 
    x-data="{ 
        step: {{ $step }},
        get isCompleted() { return this.step < this.active },
        get isActive() { return this.step == this.active },
        get isUpcoming() { return this.step > this.active }
    }"
    {{ $attributes->merge(['class' => 'flex group ' . ($orientation === 'vertical' ? 'flex-col' : 'flex-1 items-center')]) }}
>
    <div class="flex items-center gap-3">
        {{-- Circle --}}
        <div 
            class="size-10 rounded-full flex items-center justify-center shrink-0 border-2 transition-colors z-10"
            :class="{
                'bg-primary border-primary text-primary-foreground': isActive || isCompleted,
                'bg-background border-background-400 dark:border-background-600 text-foreground/50': isUpcoming
            }"
        >
            <div x-show="isCompleted" style="display: none;">
                <x-plume::icon i="icon-[fluent--checkmark-24-regular]" class="size-6" />
            </div>
            <div x-show="!isCompleted">
                <span class="text-sm font-bold" x-text="step"></span>
            </div>
        </div>

        {{-- Label --}}
        <div class="min-w-0">
            @if($title)
                <p 
                    class="text-sm font-bold truncate"
                    :class="{
                        'text-primary': isActive,
                        'text-foreground/80': isCompleted,
                        'text-foreground/40': isUpcoming
                    }"
                >{{ $title }}</p>
            @endif
            @if($description)
                <p class="text-xs text-foreground/40 truncate">{{ $description }}</p>
            @endif
        </div>
    </div>

    @if($orientation === 'vertical')
        <div class="flex gap-3">
            <div class="flex flex-col items-center w-10 shrink-0">
                <div class="flex-1 w-0.5 min-h-6 bg-background-400 dark:bg-background-600 group-last:hidden">
                    <div 
                        class="w-full bg-primary transition-all duration-500"
                        :style="{ height: isCompleted ? '100%' : '0%' }"
                    ></div>
                </div>
            </div>
            <div class="flex-1 pb-6 pt-1">
                @if($slot->isNotEmpty())
                    <div class="text-sm">
                        {{ $slot }}
                    </div>
                @endif
            </div>
        </div>
    @else
        {{-- Line (Horizontal) --}}
        <div class="hidden sm:block flex-1 h-0.5 mx-4 bg-background-400 dark:bg-background-600 group-last:hidden">
            <div 
                class="h-full bg-primary transition-all duration-500"
                :style="{ width: isCompleted ? '100%' : '0%' }"
            ></div>
        </div>
    @endif
</div>
