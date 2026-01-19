{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
--}}
<div x-data="{ active: {{ $active }} }" {{ $attributes->merge(['class' => 'flex w-full flex-col gap-2']) }}>
    {{ $slot }}
</div>