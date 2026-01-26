# Alert

Displays a callout for user attention with semantic styling and optional dismissibility.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `icon` | `string` | `null` | Iconify icon name. Auto-selected based on style if not provided. |
| `style` | `string` | `'info'` | Semantic style: 'info', 'success', 'warning', 'error'. |
| `closable` | `bool` | `false` | Whether to show a close button. |
| `autoclose` | `int` | `null` | Delay in milliseconds before automatically closing. |
| `title` | `string` | `null` | Bold title text for the alert. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the alert is closed. |

## Usage

```blade
<x-plume::alert style="success" title="Settings Updated" closable autoclose="5000">
    Your profile settings have been saved successfully.
</x-plume::alert>
```
