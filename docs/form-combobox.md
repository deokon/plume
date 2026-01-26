# Form Combobox

A searchable select input with filtering capabilities.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label for the input. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated if not provided. |
| `model` | `string` | `null` | AlpineJS model name. |
| `options` | `array` | `[]` | Array of options: [{value: 1, label: 'One'}] or [1 => 'One']. |
| `placeholder` | `string` | `'Select option...'` | Placeholder text when no value is selected. |
| `emptyMessage` | `string` | `'No results found.'` | Message to show when filtering returns no results. |
| `onSelect` | `string` | `null` | AlpineJS expression or function to call when an option is selected. |

## Usage

```blade
<x-plume::form.combobox 
    label="Country" 
    model="country_id" 
    :options="['US' => 'United States', 'CA' => 'Canada']" 
    searchable
/>
```
