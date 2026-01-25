# Stepper

Guide users through multi-step processes.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `active` | `int` | `1` | - |
| `onStepChange` | `string` | `null` | AlpineJS expression to evaluate when the active step changes. Access current step via `step`. |
| `onFinish` | `string` | `null` | AlpineJS expression to evaluate when the stepper is finished. Access final step via `step`. |

