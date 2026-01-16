{{--
@component x-plume::kbd
@description A component for displaying keyboard keys or shortcuts.
--}}
@props([
    'size' => 'md', // sm, md, lg
])

@php
    $sizeClasses = match($size) {
        'sm' => 'px-1 text-[10px] min-w-[16px] h-4',
        'md' => 'px-1.5 text-xs min-w-[20px] h-5',
        'lg' => 'px-2 text-sm min-w-[24px] h-6',
        default => 'px-1.5 text-xs min-w-[20px] h-5',
    };
@endphp

<kbd {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded border border-background-300 dark:border-background-600 bg-background-100 dark:bg-background-800 font-sans font-medium text-foreground-500 shadow-sm $sizeClasses"]) }}>
    {{ $slot }}
</kbd>
