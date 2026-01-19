{{--
@component x-plume::badge
@description Displays a badge or a component that looks like a badge.
--}}
@aware([
    'style' => null,
    'size' => null,
    'shape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, ['size' => $size, 'style' => $style, 'shape' => $shape]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<div
    {{ $cleanAttributes->merge(['class' => $component->classes($resolvedStyle, $resolvedSize, $resolvedShape)]) }}>
    {{ $slot }}
</div>
