@use('deokon\Plume\Theme')
{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
--}}
@props([
    'href' => null,
    'icon' => null,
    'fullWidth' => false,
])
@aware([
    'size' => 'md',
    'style' => 'default',
    'shape' => 'default',
])

@php
    $themeClasses = Theme::button($style, $size, $shape);

    $class =
        ($attributes->get('class') ?? '') .
        ' inline-flex items-center justify-center whitespace-nowrap transition-all shrink-0' .
        ' outline-none focus-visible:border-primary focus-visible:ring-primary/50 focus-visible:ring-[3px] dark:focus-visible:border-primary-200 dark:focus-visible:ring-primary-200/50' .
        ' hover:cursor-pointer active:scale-95' .
        ' disabled:pointer-events-none disabled:opacity-70 disabled:cursor-default disabled:saturate-30' .
        ' [&_span.icon]:pointer-events-none [&_span.icon:not([class*=\'size-\'])]:size-8 [&_span.icon]:shrink-0' .
        ' aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive' .
        ($fullWidth ? ' w-full' : '') .
        ' ' .
        $themeClasses;
@endphp

@if ($href === null)
    <button type="button" {{ $attributes->merge(['class' => $class]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@else
    <a href="{{ $href ?? '#' }}" {{ $attributes->merge(['class' => $class]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@endif
