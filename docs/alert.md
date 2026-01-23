# Alert

Displays a callout for user attention.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `icon` | `string` | `null` | - |
| `style` | `string` | `'info'` | - |
| `closable` | `bool` | `false` | - |
| `autoclose` | `int` | `null` | - |
| `title` | `string` | `null` | - |
| `onClose` | `string` | `null` | - |

## Usage

```blade
<x-plume::alert style="success" title="Success">
    Operation completed successfully.
</x-plume::alert>
```
