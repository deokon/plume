# Form Time

A native time picker input with integrated label and validation support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the time input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | Initial time value (HH:mm). Ignored if $model is used. |
| `placeholder` | `string` | `''` | Placeholder text. |

## Usage

```blade
<x-plume::form.time 
    label="Preferred Time" 
    model="booking.time" 
    required 
/>
```
