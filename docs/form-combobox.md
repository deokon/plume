# Form Combobox

A searchable select input with filtering capabilities, integrated label, and validation support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | The label for the combobox. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. Auto-generated from name if not provided. |
| `model` | `string` | `null` | AlpineJS model name for two-way binding. |
| `options` | `array` | `[]` | Array of options: [{value: 1, label: 'One'}] or [1 => 'One']. |
| `placeholder` | `string` | `'Select option...'` | Placeholder text when no value is selected. |
| `emptyMessage` | `string` | `'No results found.'` | Message to show when filtering returns no results. |
| `onSelect` | `string` | `null` | AlpineJS expression or function to call when an option is selected. |

## Usage

```blade
<x-plume::form.combobox 
    label="Country" 
    model="country_id" 
    :options="['US' => 'United States', 'CA' => 'Canada', 'GB' => 'United Kingdom']" 
    placeholder="Choose a country..."
    onSelect="$toast('Selected country: ' + result.label)"
/>
```
