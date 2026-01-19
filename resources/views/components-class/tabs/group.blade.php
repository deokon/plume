{{--
@component x-plume::tabs.group
--}}
@aware([
    'side' => 'top',
])
@php
    $resolvedSide = $attributes->get('side', $side);
@endphp
<div
    {{ $attributes->except('side')->merge(['class' => 'flex ' . match ($resolvedSide) { 'left' => 'flex-col border-r', 'right' => 'flex-col border-l', default => 'flex-row border-b' } . ' border-background-700/40 dark:border-background-400/20']) }}>
    {{ $slot }}
</div>
