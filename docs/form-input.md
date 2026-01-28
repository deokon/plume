# Form Input

Standard text input fields with integrated label, validation errors, and icon support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the input field. |
| `name` | `string` | `null` | HTML name attribute. Auto-prefixed if using x-plume::form. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name (relative to formData). Enables two-way binding. |
| `value` | `string` | `''` | Initial value for the input. Ignored if $model is used. |
| `placeholder` | `string` | `''` | Placeholder text. |
| `type` | `string` | `'text'` | HTML input type (text, email, tel, etc.). |
| `icon` | `string` | `null` | Iconify icon name to display inside the input. |

## Usage

```blade
<x-plume::form.input 
    label="Email Address" 
    name="email" 
    model="email" 
    type="email" 
    icon="icon-[fluent--mail-24-regular]"
    placeholder="you@example.com"
    required
/>

<x-plume::form.input label="Username" model="username">
    <x-slot:right-side>
        <x-plume::button style="ghost" size="sm">Check Availability</x-plume::button>
    </x-slot:right-side>
</x-plume::form.input>
```
