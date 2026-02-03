# Popover

Displays rich content in a small overlay, triggered by clicking a button or element.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | `string` | `null` | The text or slot content for the popover trigger. |
| `position` | `string` | `'bottom'` | The primary position: 'top', 'bottom', 'left', 'right'. |
| `align` | `string` | `'center'` | Alignment relative to position: 'start', 'center', 'end'. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the popover opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the popover closes. |

## Usage

```blade
<x-plume::popover trigger="Help Info" position="top">
    <div class="space-y-2">
        <h4 class="font-bold">Information</h4>
        <p class="text-sm">This is a helpful popover with some detailed explanation.</p>
    </div>
</x-plume::popover>
```
