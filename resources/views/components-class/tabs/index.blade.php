{{--
@component x-plume::tabs
@description A set of layered sections of content, known as tab panels, that are displayed one at a time.
@prop string $default (Default: '1')
@prop string $side (Default: 'top')
@prop string $size (Default: 'md')
@prop string $style (Default: 'default')
@prop string $shape (Default: 'default')
@prop string $onTabChange (Default: null)
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
<div x-data="tabs('{{ $default }}', { onTabChange: {{ Js::from($onTabChange) }} })" {{ $attributes->merge(['class' => 'w-full']) }}>
    <div class="flex {{ $directionClass }}">
        {{ $slot }}
    </div>
</div>
