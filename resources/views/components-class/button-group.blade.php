{{--
@component x-plume::button-group
--}}
@php
    $groupSize = $attributes->get('size', $component->size);
    $groupStyle = $attributes->get('style', $component->style);
    $groupShape = $attributes->get('shape', $component->shape);
@endphp
<div role="group" {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $groupClasses]) }}>
    <x-plume::button-group.context :groupSize="$groupSize" :groupStyle="$groupStyle" :groupShape="$groupShape">
        {{ $slot }}
    </x-plume::button-group.context>
</div>
