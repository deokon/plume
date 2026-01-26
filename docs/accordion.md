# Accordion

Collapsible content panels for saving vertical space.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `alwaysOpen` | `bool` | `false` | Whether multiple items can be open at once. |
| `onToggle` | `string` | `null` | AlpineJS expression or function to call when an item is toggled. |

## Usage

```blade
<x-plume::accordion>
    <x-plume::accordion.item title="Item 1">
        Content 1
    </x-plume::accordion.item>
</x-plume::accordion>
```
