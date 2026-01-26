# Form Color

A native color picker input with hex value display.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the color input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `'#000000'` | Initial hex color value. Ignored if $model is used. |

## Usage

```blade
<x-plume::form.color 
    label="Brand Color" 
    model="brand_hex" 
    value="#3b82f6" 
/>
```
