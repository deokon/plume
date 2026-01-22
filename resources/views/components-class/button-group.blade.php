{{--
@component x-plume::button-group
@description Groups related buttons together.
--}}
@php
    $groupSize = $attributes->get('size', $component->groupSize);
    $groupStyle = $attributes->get('style', $component->groupStyle);
    $groupShape = $attributes->get('shape', $component->groupShape);
@endphp
<div role="group" {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $groupClasses]) }}>
    <x-plume::button-group.context :groupSize="$groupSize" :groupStyle="$groupStyle" :groupShape="$groupShape">
        {{ $slot }}
    </x-plume::button-group.context>
</div>