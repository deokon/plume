# Form

A collection of form components for user input.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | - |
| `method` | `string` | `'POST'` | - |
| `formData` | `array|string|null` | `null` | - |
| `submitButton` | `string` | `null` | - |
| `resetButton` | `string` | `null` | Label for an optional reset button. |
| `hideOnSuccess` | `bool` | `false` | Hide form inputs after a successful submission. |
| `resetOnSuccess` | `bool` | `false` | Reset form data to its initial state after a successful submission. |
| `onSuccess` | `string` | `null` | AlpineJS expression to evaluate after a successful submission. Access the response via `result`. |
| `onError` | `string` | `null` | AlpineJS expression to evaluate after a failed submission. Access the error via `result`. |
| `inline` | `bool` | `false` | Use a compact, single-line layout for the form. |

