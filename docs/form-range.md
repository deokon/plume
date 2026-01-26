# Form Range

A slider input for selecting a numeric value from a range with dynamic value display.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the range input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `'0'` | Initial range value. Ignored if $model is used. |
| `min` | `int` | `0` | Minimum allowed value. |
| `max` | `int` | `100` | Maximum allowed value. |
| `step` | `int` | `1` | Incremental step value. |

## Usage

```blade
<x-plume::form.range 
    label="Volume" 
    model="settings.volume" 
    min="0" 
    max="100" 
    step="5"
/>
```
