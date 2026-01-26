# Form Date

A native date picker input with integrated label and validation support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the date input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | Initial date value (YYYY-MM-DD). Ignored if $model is used. |
| `placeholder` | `string` | `''` | Placeholder text (browser support varies for type="date"). |

## Usage

```blade
<x-plume::form.date 
    label="Birthday" 
    model="profile.birthday" 
    required 
/>
```
