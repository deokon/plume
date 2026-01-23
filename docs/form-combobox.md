# Combobox

A searchable select input.

## Overview

The Combobox component allows users to search and select a value from a list of options, providing a more efficient experience than a standard select for long lists.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `options` | `array` | `[]` | Array of objects: `[{ value, label }]`. |
| `placeholder` | `string` | `'Select option...'` | Input placeholder. |

## Usage

### Basic Usage

```blade
<x-plume::form.combobox 
    label="Framework" 
    model="selectedFramework" 
    :options="[
        ['value' => 'laravel', 'label' => 'Laravel'],
        ['value' => 'alpine', 'label' => 'Alpine.js'],
        ['value' => 'tailwind', 'label' => 'Tailwind CSS']
    ]" 
/>
```
