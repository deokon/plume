# Form Toggle

A toggle switch for boolean selection or binary states.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label text for the toggle. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `'1'` | The value submitted when the toggle is on. |
| `checked` | `bool` | `false` | Whether the toggle is initially on. |

## Usage

```blade
<x-plume::form.toggle 
    label="Enable Notifications" 
    model="notifications_enabled" 
/>
```
