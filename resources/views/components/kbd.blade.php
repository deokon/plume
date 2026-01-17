@use('deokon\Plume\Theme')
{{--
@component x-plume::kbd
@description A component for displaying keyboard keys or shortcuts.
--}}
@props([
    'size' => 'md', // sm, md, lg
])

@php
    $sizeClasses = Theme::kbd($size);
@endphp

<kbd
    {{ $attributes->merge(['class' => "inline-flex items-center justify-center rounded border border-background-300 dark:border-background-600 bg-background-100 dark:bg-background-800 font-sans font-medium text-foreground-500 shadow-sm $sizeClasses"]) }}>
    {{ $slot }}
</kbd>
