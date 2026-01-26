# Stepper

Guide users through multi-step processes with clear visual indicators.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `active` | `int` | `1` | The initially active step number. |
| `onStepChange` | `string` | `null` | AlpineJS expression or function to call when the active step changes. |
| `onFinish` | `string` | `null` | AlpineJS expression or function to call when the final step is completed. |

## Usage

```blade
<x-plume::stepper active="1">
    <x-plume::stepper.step title="Personal Info" step="1">
        Step 1 content...
    </x-plume::stepper.step>
    <x-plume::stepper.step title="Address" step="2">
        Step 2 content...
    </x-plume::stepper.step>
</x-plume::stepper>
```
