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
