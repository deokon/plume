{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
@usage
<x-plume::stepper :active="1">
    <x-plume::stepper.step step="1" title="Account" next />
    <x-plume::stepper.step step="2" title="Profile" prev />
</x-plume::stepper>
--}}
@props([
    'active' => 1,
])

<div  x-data="{ active: {{ $active }} }" {{ $attributes->merge(['class' => 'flex w-full flex-col gap-2']) }}>
    {{ $slot }}
</div>