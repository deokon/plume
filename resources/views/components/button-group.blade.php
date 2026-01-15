{{--
@component x-plume::button-group
@prop {string} size - Default: md
@prop {boolean} stack - Default: true
--}}
@props([
    'size' => 'md',
    'stack' => true,
])

@php
    $baseClass = 'inline-flex rounded-md shadow-sm border border-background-400 dark:border-background-600 overflow-hidden';
    
    if ($stack) {
        $orientationClasses = 'flex-col sm:flex-row';
        
        // Rounding logic: 
        // Mobile: First child rounds top, last child rounds bottom.
        // Desktop (sm:): First child rounds left, last child rounds right.
        $roundingClasses = ' '
            . '[&>:first-child]:rounded-b-none sm:[&>:first-child]:rounded-r-none sm:[&>:first-child]:rounded-bl-md'
            . ' [&>:not(:first-child):not(:last-child)]:rounded-none'
            . ' [&>:last-child]:rounded-t-none sm:[&>:last-child]:rounded-l-none sm:[&>:last-child]:rounded-tr-md';
            
        // Border logic:
        // Mobile: Border bottom between items.
        // Desktop (sm:): Border right between items.
        $borderClasses = ' '
            . '[&>*]:border-0 [&>*:not(:last-child)]:border-b sm:[&>*:not(:last-child)]:border-b-0 sm:[&>*:not(:last-child)]:border-r'
            . ' [&>*]:border-background-400 dark:[&>*]:border-background-600';
    } else {
        $orientationClasses = 'flex-row';
        $roundingClasses = ' [&>:first-child]:rounded-r-none [&>:not(:first-child):not(:last-child)]:rounded-none [&>:last-child]:rounded-l-none';
        $borderClasses = ' [&>*]:border-0 [&>*:not(:last-child)]:border-r [&>*]:border-background-400 dark:[&>*]:border-background-600';
    }

    $class = $baseClass . ' ' . $orientationClasses . $roundingClasses . $borderClasses;
@endphp

<div role="group" {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
