{{--
@component x-plume::tooltip
@description A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.
--}}
@props(['text', 'position' => 'top'])

@php
    $positionClasses = match ($position) {
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        // 'top'
        default => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
    };

    $arrowClasses = match ($position) {
        'bottom'
            => 'bottom-full left-1/2 -translate-x-1/2 border-b-background-800 dark:border-b-background-200 border-x-transparent border-t-transparent',
        'left'
            => 'left-full top-1/2 -translate-y-1/2 border-l-background-800 dark:border-l-background-200 border-y-transparent border-r-transparent',
        'right'
            => 'right-full top-1/2 -translate-y-1/2 border-r-background-800 dark:border-r-background-200 border-y-transparent border-l-transparent',
        // 'top'
        default
            => 'top-full left-1/2 -translate-x-1/2 border-t-background-800 dark:border-t-background-200 border-x-transparent border-b-transparent',
    };
@endphp

<div {{ $attributes->merge(['class' => 'relative group inline-block']) }}>
    {{ $slot }}

    <div
        class="absolute z-50 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-200 {{ $positionClasses }}">
        <div
            class="relative bg-background-800 text-background-200 dark:bg-background-200 dark:text-background-800 text-xs rounded py-1 px-2 whitespace-nowrap shadow-md">
            {{ $text }}
            <div class="absolute border-4 {{ $arrowClasses }}"></div>
        </div>
    </div>
</div>
