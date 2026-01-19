{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
--}}
@aware([
    'groupSize' => null,
    'groupStyle' => null,
    'groupShape' => null,
    'groupSide' => null,
])
@php
    $groupSize = $groupSize ?? $size ?? $component->size;
    $groupStyle = $groupStyle ?? $style ?? $component->style;
    $groupShape = $groupShape ?? $shape ?? $component->shape;
    $groupSide = $groupSide ?? $side ?? $component->side;
@endphp
<div x-data="{ activeTab: '{{ $default }}' }" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex {{ $directionClass }}">
        {{ $slot }}
    </div>
</div>
