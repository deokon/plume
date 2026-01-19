{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
--}}
@aware([
    'size' => 'md',
    'style' => 'default',
    'shape' => 'default',
])
@php
    $resolvedSize = $attributes->get('size', $size);
    $resolvedStyle = $attributes->get('style', $style);
    $resolvedShape = $attributes->get('shape', $shape);
@endphp
@if ($href === null)
    <button type="button" {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@else
    <a href="{{ $href ?? '#' }}" {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@endif