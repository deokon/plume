# Alert Dialog

Modal dialog specifically designed for alerting users to important information or actions.

## Overview

Alert Dialogs are used to interrupt the user with important content and expect a specific response. They are often used for confirmation of destructive actions.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `'alert-dialog'` | **Required.** Unique identifier for the modal. |
| `show` | `boolean` | `false` | Initial visibility state. |
| `maxWidth` | `string` | `'2xl'` | Max width: `sm`, `md`, `lg`, `xl`, `2xl`. |
| `action` | `string` | `'Confirm'` | Label for the primary action button. |
| `withCancel` | `boolean` | `true` | Whether to show the cancel button. |
| `onConfirm` | `string` | `''` | AlpineJS expression to execute on confirmation. |

## Usage

### Confirmation Example

```blade
<x-plume::button @click="$openModal('delete-item')">
    Delete Item
</x-plume::button>

<x-plume::alert-dialog 
    name="delete-item"
    title="Are you absolutely sure?"
    action="Delete"
    onConfirm="console.log('Deleted!')"
>
    This action cannot be undone. This will permanently delete your account and remove your data from our servers.
</x-plume::alert-dialog>
```
