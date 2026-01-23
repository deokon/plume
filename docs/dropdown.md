# Dropdown

Displays a menu of actions or functions triggered by a button.

## Overview

Dropdowns allow users to choose one value from a list or trigger actions without navigating away from the page.

## Properties

### Dropdown (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | `string` | `null` | Label for the trigger button. |
| `align` | `string` | `'right'` | Menu alignment: `left`, `right`. |
| `width` | `string` | `'md'` | Menu width: `sm`, `md`, `lg`, `xl`. |
| `triggerStyle` | `string` | `'outline'` | Style of the trigger button. |

### Dropdown Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `style` | `string` | `'ghost'` | Item style variant. |

## Usage

### Simple Actions Menu

```blade
<x-plume::dropdown trigger="Actions">
    <x-plume::dropdown.item @click="edit()">Edit</x-plume::dropdown.item>
    <x-plume::dropdown.item @click="duplicate()">Duplicate</x-plume::dropdown.item>
    <x-plume::dropdown.separator />
    <x-plume::dropdown.item @click="remove()" class="text-destructive">Delete</x-plume::dropdown.item>
</x-plume::dropdown>
```
