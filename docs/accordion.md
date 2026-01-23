# Accordion

Collapsible content panels for saving vertical space.

## Overview

The Accordion component allows you to toggle the visibility of content sections. It's particularly useful for FAQs or grouping large amounts of related information.

## Properties

### Accordion (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `alwaysOpen` | `boolean` | `false` | If true, multiple items can stay open simultaneously. |

### Accordion Item

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `-` | **Required.** The header text for the item. |
| `open` | `boolean` | `false` | Whether the item should be open by default. |

## Usage

### Basic Usage

By default, only one item can be open at a time.

```blade
<x-plume::accordion>
    <x-plume::accordion.item title="What is Plume UI?">
        Plume UI is a collection of reusable Blade components for Laravel applications.
    </x-plume::accordion.item>
    <x-plume::accordion.item title="Is it customizable?">
        Yes, it uses standard Tailwind utility classes and CSS variables.
    </x-plume::accordion.item>
</x-plume::accordion>
```

### Always Open

Use the `alwaysOpen` prop to allow multiple items to be expanded simultaneously.

```blade
<x-plume::accordion alwaysOpen>
    <x-plume::accordion.item title="Item 1" open>
        This item is open by default.
    </x-plume::accordion.item>
    <x-plume::accordion.item title="Item 2">
        You can open this without closing Item 1.
    </x-plume::accordion.item>
</x-plume::accordion>
```
