# Select

A dropdown select input.

## Overview

The Select component provides a styled dropdown menu for users to choose one or more options from a list.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `options` | `array` | `[]` | Array of objects: `[{ value, label }]`. |
| `placeholder` | `string` | `null` | Initial placeholder text. |
| `multiple` | `boolean` | `false` | Enable multiple selection. |

## Usage

### Basic Usage

```blade
<x-plume::form.select 
    label="Role" 
    model="role" 
    :options="[
        ['value' => 'admin', 'label' => 'Administrator'],
        ['value' => 'editor', 'label' => 'Editor'],
        ['value' => 'viewer', 'label' => 'Viewer']
    ]" 
/>
```
