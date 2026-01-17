{{--
@component x-plume::aspect
@description A container component to maintain consistent proportions for media and content.
--}}
@props([
    'ratio' => 'video',
])

@php
    $ratioClass = match ($ratio) {
        'square' => 'aspect-square',
        'video' => 'aspect-video',
        '4/3' => 'aspect-[4/3]',
        '3/2' => 'aspect-[3/2]',
        '21/9' => 'aspect-[21/9]',
        '1/1' => 'aspect-square',
        default => $ratio, // Allow custom aspect ratios like aspect-[16/10]
    };
@endphp

<div {{ $attributes->merge(['class' => 'relative w-full overflow-hidden ' . $ratioClass]) }}>
    <div class="absolute inset-0 w-full h-full">
        {{ $slot }}
    </div>
</div>
