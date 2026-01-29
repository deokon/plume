{{--
@component x-plume::stepper
@description Guide users through multi-step processes with clear visual indicators.
@prop int $active (Default: 1) The initially active step number.
@prop string $model (Default: null) AlpineJS model name for the active step.
@prop string $onStepChange (Default: null) AlpineJS expression or function to call when the active step changes.
@prop string $onFinish (Default: null) AlpineJS expression or function to call when the final step is completed.
@usage
<x-plume::stepper active="1" model="currentStep">
    <x-plume::stepper.step title="Personal Info" step="1">
        Step 1 content...
    </x-plume::stepper.step>
    <x-plume::stepper.step title="Address" step="2">
        Step 2 content...
    </x-plume::stepper.step>
</x-plume::stepper>
--}}
@php
    $resolvedModel = $model;
    if ($model && !str_contains($model, '.') && !str_starts_with($model, 'data.')) {
        $resolvedModel = 'data.' . $model;
    }
@endphp
<div x-data="stepper({{ $active }}, '{{ $resolvedModel }}', { onStepChange: {{ Js::from($onStepChange) }}, onFinish: {{ Js::from($onFinish) }} })" {{ $attributes->merge(['class' => 'flex w-full flex-col gap-2']) }}>
    {{ $slot }}
</div>
