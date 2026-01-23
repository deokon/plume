{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
@prop int $active (Default: 1)
--}}
<div x-data="{ active: {{ $active }} }" {{ $attributes->merge(['class' => 'flex w-full flex-col gap-2']) }}>
    {{ $slot }}
</div>