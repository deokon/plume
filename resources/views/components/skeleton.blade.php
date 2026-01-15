@props([
    'shape' => 'rect',
    'animation' => 'pulse',
])

@php
    $shapes = [
        'rect' => 'rounded-md',
        'circle' => 'rounded-full',
        'text' => 'rounded-sm h-[1em] w-full',
    ];

    $animations = [
        'pulse' => 'animate-pulse',
        'wave' => 'animate-wave',
        'none' => '',
    ];

    $classes = [
        'bg-background-700/20 dark:bg-background-400/10 flex items-center justify-center overflow-hidden',
        $shapes[$shape] ?? $shapes['rect'],
        $animations[$animation] ?? $animations['pulse'],
    ];
@endphp

<div {{ $attributes->class($classes) }}>
    @if($slot->isNotEmpty())
        <div class="opacity-30 dark:opacity-20 flex items-center justify-center">
            {{ $slot }}
        </div>
    @endif
</div>