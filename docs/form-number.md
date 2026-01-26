# Form Number

A numeric input field with min, max, and step constraints.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the number input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `null` | Initial numeric value. Ignored if $model is used. |
| `min` | `int` | `null` | Minimum allowed value. |
| `max` | `int` | `null` | Maximum allowed value. |
| `step` | `int` | `null` | Incremental step value. |
| `placeholder` | `string` | `''` | Placeholder text. |

## Usage

```blade
<x-plume::form.number 
    label="Quantity" 
    model="cart.qty" 
    min="1" 
    max="10" 
    step="1"
    required
/>
```
