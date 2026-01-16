{{--
@component x-plume::table
@description A responsive table component.
--}}
@props([
    'striped' => false,
    'hoverable' => false,
    'stickyHeader' => false,
    'density' => 'default', // compact, default, loose
])

@php
    $densityClasses = match($density) {
        'compact' => '[&_td]:p-2 [&_th]:h-8 [&_th]:px-2',
        'loose' => '[&_td]:p-6 [&_th]:h-16 [&_th]:px-6',
        default => '[&_td]:p-4 [&_th]:h-12 [&_th]:px-4',
    };
@endphp

<div class="relative w-full overflow-auto {{ $stickyHeader ? 'max-h-[500px]' : '' }}">
    <table {{ $attributes->merge(['class' => 'w-full caption-bottom text-sm ' . $densityClasses . 
        ($hoverable ? ' [&_tbody_tr:hover]:bg-background-200/50 dark:[&_tbody_tr:hover]:bg-background-700/50' : '') .
        ($striped ? ' [&_tbody_tr:nth-child(even)]:bg-background-100/50 dark:[&_tbody_tr:nth-child(even)]:bg-background-800/50' : '')
    ]) }}>
        {{ $slot }}
    </table>
</div>