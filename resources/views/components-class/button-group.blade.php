{{--
@component x-plume::button-group
@description Groups related buttons together.
@prop string $size (Default: null) The size of buttons in the group (xs, sm, md, lg, xl).
@prop bool $stack (Default: true) Whether buttons should stack on mobile screens.
@prop string $style (Default: null) The visual style of buttons in the group (primary, secondary, success, error, warning, info, ghost, outline).
@prop string $shape (Default: null) The shape of buttons in the group (default, pill, square).
--}}
@php
    $groupSize = $attributes->get('size', $component->groupSize);
    $groupStyle = $attributes->get('style', $component->groupStyle);
    $groupShape = $attributes->get('shape', $component->groupShape);
@endphp
<div role="group"
    {{ $attributes->except(['size', 'style', 'shape'])->merge(['class' => $groupClasses]) }}>
    <x-plume::button-group.context :groupSize="$groupSize" :groupStyle="$groupStyle" :groupShape="$groupShape">
        {{ $slot }}
    </x-plume::button-group.context>
</div>
