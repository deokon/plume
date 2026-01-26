# Form

A collection of form components for user input.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | - |
| `method` | `string` | `'POST'` | - |
| `formData` | `array|string|null` | `null` | - |
| `submitButton` | `string` | `null` | - |
| `resetButton` | `string` | `null` | - |
| `hideOnSuccess` | `bool` | `false` | - |
| `resetOnSuccess` | `bool` | `false` | - |
| `onSuccess` | `string` | `null` | AlpineJS expression to evaluate after a successful submission. Access the response via `result`. |
| `onError` | `string` | `null` | AlpineJS expression to evaluate after a failed submission. Access the error via `result`. |
| `showAlerts` | `bool` | `true` | Show or hide automatic success/error alerts. |
| `inline` | `bool` | `false` | Use a compact, single-line layout for the form. |

