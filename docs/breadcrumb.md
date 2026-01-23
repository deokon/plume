# Breadcrumb

Displays the path to the current resource using a hierarchy of links.

## Overview

Breadcrumbs help users understand their current location within a site's structure and provide a quick way to navigate back to parent levels.

## Properties

### Breadcrumb (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `items` | `array` | `[]` | Optional array of items for programmatic generation. |
| `separator` | `string` | `icon-[fluent--chevron-right-24-regular]` | Custom separator icon name. |

### Breadcrumb Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `href` | `string` | `null` | Link destination. |
| `active` | `boolean` | `false` | Whether the item represents the current page. |

## Usage

### Manual Structure

```blade
<x-plume::breadcrumb>
    <x-plume::breadcrumb.item href="/">Home</x-plume::breadcrumb.item>
    <x-plume::breadcrumb.item href="/docs">Docs</x-plume::breadcrumb.item>
    <x-plume::breadcrumb.item active>Breadcrumb</x-plume::breadcrumb.item>
</x-plume::breadcrumb>
```
