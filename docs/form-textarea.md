# Form Textarea

A multi-line text input for longer content.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the textarea. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `value` | `string` | `''` | Initial content for the textarea. Ignored if $model is used. |
| `rows` | `int` | `3` | The number of visible text lines. |
| `placeholder` | `string` | `''` | Placeholder text. |

## Usage

```blade
<x-plume::form.textarea 
    label="Biography" 
    model="bio" 
    rows="5" 
    placeholder="Tell us about yourself..." 
/>
```
