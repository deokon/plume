{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
--}}
@props([
    'active' => 1,
    'orientation' => 'horizontal',
])

<div 
    x-data="{ 
        active: {{ $active }}
    }" 
    {{ $attributes->merge(['class' => 'flex w-full ' . ($orientation === 'vertical' ? 'flex-col gap-2' : 'flex-col sm:flex-row gap-4 sm:gap-0 sm:items-center')]) }}
>
    {{ $slot }}
</div>
