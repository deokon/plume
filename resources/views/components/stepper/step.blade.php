@props([
    'step',
    'title',
    'description' => null,
])

@aware([
    'active' => 1,
])

@php
    $isCompleted = $step < $active;
    $isActive = $step == $active;
    $isUpcoming = $step > $active;
@endphp

<div {{ $attributes->merge(['class' => 'flex-1 flex items-center group']) }}>
    <div class="flex items-center gap-3">
        {{-- Circle --}}
        <div @class([
            'size-10 rounded-full flex items-center justify-center shrink-0 border-2 transition-colors',
            'bg-primary border-primary text-primary-foreground' => $isActive || $isCompleted,
            'bg-background border-background-400 dark:border-background-600 text-foreground/50' => $isUpcoming,
        ])>
            @if($isCompleted)
                <x-plume::icon i="icon-[fluent--checkmark-24-regular]" class="size-6" />
            @else
                <span class="text-sm font-bold">{{ $step }}</span>
            @endif
        </div>

        {{-- Label --}}
        <div class="min-w-0">
            <p @class([
                'text-sm font-bold truncate',
                'text-primary' => $isActive,
                'text-foreground/80' => $isCompleted,
                'text-foreground/40' => $isUpcoming,
            ])>{{ $title }}</p>
            @if($description)
                <p class="text-xs text-foreground/40 truncate">{{ $description }}</p>
            @endif
        </div>
    </div>

    {{-- Line (Hidden on mobile stack, shown on sm: flex) --}}
    <div class="hidden sm:block flex-1 h-0.5 mx-4 bg-background-400 dark:bg-background-600 last:hidden">
        <div @class([
            'h-full bg-primary transition-all duration-500',
            'w-full' => $isCompleted,
            'w-0' => !$isCompleted,
        ])></div>
    </div>
</div>
