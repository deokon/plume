# Accordion

Collapsible content panels for saving vertical space.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `alwaysOpen` | `bool` | `false` | - |
| `onToggle` | `string` | `null` | AlpineJS expression to evaluate when an item is toggled. Access item ID via `id` and state via `isOpen`. |

## Usage

```blade
<x-plume::accordion>
    <x-plume::accordion.item title="Item 1">
        Content 1
    </x-plume::accordion.item>
</x-plume::accordion>
```
