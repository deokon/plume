{{--
@component x-plume::stepper
@description Guide users through multi-step processes.
@prop int $active (Default: 1)
@prop string $onStepChange (Default: null)
@prop string $onFinish (Default: null)
--}}
<div x-data="stepper({{ $active }}, { onStepChange: {{ Js::from($onStepChange) }}, onFinish: {{ Js::from($onFinish) }} })" {{ $attributes->merge(['class' => 'flex w-full flex-col gap-2']) }}>
    {{ $slot }}
</div>
