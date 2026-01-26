# Form Password

A secure password input field with a built-in visibility toggle.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the password input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | Initial password value. Ignored if $model is used. |
| `placeholder` | `string` | `''` | Placeholder text. |
| `icon` | `string` | `''` | Placeholder text. |

## Usage

```blade
<x-plume::form.password 
    label="New Password" 
    model="password" 
    placeholder="Choose a strong password"
    required
/>
```
