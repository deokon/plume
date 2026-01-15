{{--
@component x-plume::gallery
@description Responsive grid layout for images and figures.
@prop {number} cols - Max columns on desktop. Options: 1, 2, 3, 4. (Default: 3)
@prop {number} gap - Tailwind gap size (e.g. 2 = 0.5rem). (Default: 4)
--}}
@props([
    'cols' => 3,
    'gap' => 4,
])

@php
    $gridCols = match(intval($cols)) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',
        default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    };

    $gridGap = 'gap-'.$gap;
@endphp

<div {{ $attributes->merge(['class' => 'grid ' . $gridCols . ' ' . $gridGap]) }}>
    {{ $slot }}
</div>
