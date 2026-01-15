{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
--}}
@props([
    'active' => 1,
])

<div 
    x-data="{ 
        active: {{ $active }}
    }" 
    {{ $attributes->merge(['class' => 'flex flex-col sm:flex-row gap-4 sm:gap-0 sm:items-center w-full']) }}
>
    {{ $slot }}
</div>