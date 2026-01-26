# Form Select

A standard dropdown select input with multi-select support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the select input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `options` | `array` | `[]` | Associative array of options: [value => label]. |
| `placeholder` | `string` | `null` | Placeholder text for the first disabled option. |
| `multiple` | `bool` | `false` | Whether to allow multiple selections. |

## Usage

```blade
<x-plume::form.select 
    label="Category" 
    model="category_id" 
    :options="['1' => 'Technology', '2' => 'Design']" 
    placeholder="Select a category"
/>

<x-plume::form.select label="Tags" model="tags" multiple>
    <option value="php">PHP</option>
    <option value="laravel">Laravel</option>
</x-plume::form.select>
```
