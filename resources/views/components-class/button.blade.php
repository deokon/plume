{{--
@component x-plume::button
@description Displays a button or a component that looks like a button.
--}}
@aware([
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, [
        'size' => $groupSize,
        'style' => $groupStyle,
        'shape' => $groupShape,
    ]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
@if ($href === null)
    <button type="button" {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </button>
@else
    <a href="{{ $href ?? '#' }}" {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedStyle, $resolvedShape)]) }}>
        @if ($icon)
            <x-plume::icon i="{{ $icon }}" />
        @endif
        {{ $slot }}
    </a>
@endif
