# Popover

Displays rich content in a portal, triggered by a button.

## Overview

Popovers are used to display non-critical information or small forms when a user interacts with a specific element.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | `string` | `null` | Label for the trigger button. |
| `position` | `string` | `'bottom'` | Position relative to trigger: `top`, `bottom`, `left`, `right`. |
| `align` | `string` | `'center'` | Alignment: `start`, `center`, `end`. |

## Usage

### Simple Popover

```blade
<x-plume::popover trigger="View Details">
    <div class="p-4 w-64">
        <h4 class="font-bold">Information</h4>
        <p class="text-sm">This is more detailed information that appears inside the popover.</p>
    </div>
</x-plume::popover>
```
