# Form Datetime

A native date and time picker input with integrated label and validation support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | Initial value (YYYY-MM-DDTHH:mm). Ignored if $model is used. |
| `placeholder` | `string` | `''` | Placeholder text. |

## Usage

```blade
<x-plume::form.datetime 
    label="Event Start" 
    model="event.starts_at" 
    required 
/>
```
