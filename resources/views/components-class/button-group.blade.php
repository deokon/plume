{{--
@component x-plume::button-group
--}}
@php
    $groupSize = $attributes->get('size', $component->groupSize);
    $groupStyle = $attributes->get('style', $component->groupStyle);
    $groupShape = $attributes->get('shape', $component->groupShape);
@endphp
<div role="group" {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $groupClasses]) }}>
    {{ $slot }}
</div>
