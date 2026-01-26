# Form Checkbox

A checkbox input for binary selection or boolean state.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label text for the checkbox. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | The value submitted when the checkbox is checked. |
| `checked` | `bool` | `false` | Whether the checkbox is initially checked. |

## Usage

```blade
<x-plume::form.checkbox 
    label="Accept Terms" 
    name="terms" 
    model="accept_terms" 
    required 
/>

<x-plume::form.checkbox name="remember" model="remember">
    Remember me
</x-plume::form.checkbox>
```
