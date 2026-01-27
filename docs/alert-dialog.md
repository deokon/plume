# Alert Dialog

Modal dialog specifically designed for alerting users to important information or actions.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `'alert-dialog'` | Unique name for the dialog, used by x-plume::button to target it. |
| `show` | `bool` | `false` | Whether the dialog is visible by default. |
| `maxWidth` | `string` | `'2xl'` | Maximum width of the dialog (sm, md, lg, xl, 2xl, etc.). |
| `action` | `string` | `'Confirm'` | Text for the primary action button. |
| `withCancel` | `bool` | `true` | Whether to show a cancel button. |
| `onConfirm` | `string` | `''` | JavaScript action to execute when the primary button is clicked. |

