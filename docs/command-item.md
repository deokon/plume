# Command Item

An individual command or selection within a command palette group.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | `string` | `null` | The underlying value associated with the item. |
| `onSelect` | `string` | `null` | AlpineJS expression or function to call when the item is activated. |
| `icon` | `string` | `null` | Iconify icon name. |
| `shortcut` | `string` | `null` | Keyboard shortcut text to display (e.g., '⌘K'). |

## Usage

```blade
<x-plume::command.item 
    icon="icon-[fluent--save-24-regular]" 
    shortcut="⌘S"
    @click="$success('Saved!')"
>
    Save Document
</x-plume::command.item>
```
