# Tooltip

Brief informative messages on hover or focus.

## Overview

Tooltips provide additional context for an element, appearing when the user hovers over it with a mouse or focuses it using a keyboard.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `text` | `string` | `null` | **Required.** Content of the tooltip. |
| `position` | `string` | `'top'` | `top`, `bottom`, `left`, `right`. |

## Usage

### Simple Usage

```blade
<x-plume::tooltip text="Add new item">
    <x-plume::button icon="icon-[fluent--add-24-regular]" size="icon" />
</x-plume::tooltip>
```

### Different Positions

```blade
<x-plume::tooltip text="Helpful info" position="right">
    <span class="underline decoration-dotted">Hover me</span>
</x-plume::tooltip>
```
