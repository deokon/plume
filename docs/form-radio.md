# Form Radio

A radio button for single selection from a group of options.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label text for the radio button. |
| `name` | `string` | `null` | HTML name attribute. Must be the same for all radios in a group. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | The value submitted when this radio is selected. |
| `checked` | `bool` | `false` | Whether this radio is initially selected. |

## Usage

```blade
<x-plume::form.group label="Plan">
    <x-plume::form.radio name="plan" value="basic" label="Basic" model="selectedPlan" />
    <x-plume::form.radio name="plan" value="pro" label="Pro" model="selectedPlan" />
</x-plume::form.group>
```
