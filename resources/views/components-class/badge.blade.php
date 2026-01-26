{{--
@component x-plume::badge
@description Displays a small, styled label for status, counts, or categorization.
@prop string $style (Default: 'default') Visual style: 'default', 'secondary', 'error', 'outline', 'success'.
@prop string $size (Default: 'md') Size of the badge: 'sm', 'md', 'lg'.
@prop string $shape (Default: 'default') Shape: 'default' (rounded), 'pill', 'square'.
@usage
<x-plume::badge style="success" shape="pill">Active</x-plume::badge>
<x-plume::badge style="outline" size="sm">v1.0.0</x-plume::badge>
--}}
@aware([
    'style' => null,
    'size' => null,
    'shape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, [
        'size' => $size,
        'style' => $style,
        'shape' => $shape,
    ]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<div
    {{ $cleanAttributes->merge(['class' => $component->classes($resolvedStyle, $resolvedSize, $resolvedShape)]) }}>
    {{ $slot }}
</div>
