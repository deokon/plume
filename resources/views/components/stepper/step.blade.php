{{--
@component x-plume::stepper.step
@prop {mixed} step - Default: required
@prop {mixed} title - Default: required
@prop {null} description - Default: null
--}}
@props([
    'step',
    'title',
    'description' => null,
])

<div 
    x-data="{ 
        step: {{ $step }},
        get isCompleted() { return this.step < this.active },
        get isActive() { return this.step == this.active },
        get isUpcoming() { return this.step > this.active }
    }"
    {{ $attributes->merge(['class' => 'flex-1 flex items-center group']) }}
>
    <div class="flex items-center gap-3">
        {{-- Circle --}}
        <div 
            class="size-10 rounded-full flex items-center justify-center shrink-0 border-2 transition-colors"
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
            <p 
                class="text-sm font-bold truncate"
                :class="{
                    'text-primary': isActive,
                    'text-foreground/80': isCompleted,
                    'text-foreground/40': isUpcoming
                }"
            >{{ $title }}</p>
            @if($description)
                <p class="text-xs text-foreground/40 truncate">{{ $description }}</p>
            @endif
        </div>
    </div>

    {{-- Line --}}
    <div class="hidden sm:block flex-1 h-0.5 mx-4 bg-background-400 dark:bg-background-600 last:hidden">
        <div 
            class="h-full bg-primary transition-all duration-500"
            :style="{ width: isCompleted ? '100%' : '0%' }"
        ></div>
    </div>
</div>