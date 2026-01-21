{{--
@component x-plume::tabs.group
@description Container for tab navigation items.
--}}
@aware([
    'side' => null,
    'size' => null,
    'style' => null,
    'shape' => null,
])
@php
    $resolvedSide = $component->resolveAttribute($attributes, 'side', $side, 'top');
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<div
    {{ $cleanAttributes->merge(['class' => 'flex ' . match ($resolvedSide) { 'left' => 'flex-col border-r', 'right' => 'flex-col border-l', default => 'flex-row border-b' } . ' border-background-700/40 dark:border-background-400/20']) }}>
    {{ $slot }}
</div>