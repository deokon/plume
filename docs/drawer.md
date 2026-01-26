# Drawer

A panel that slides in from the edge of the screen.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | Unique identifier for the drawer, used with $openDrawer(name). |
| `show` | `bool` | `false` | Whether to show the drawer by default on page load. |
| `side` | `string` | `'right'` | Side to slide in from: 'left', 'right', 'top', 'bottom'. |
| `title` | `string` | `null` | Simple title string. For complex headers, use the 'header' slot. |
| `description` | `string` | `null` | Optional subtitle or description. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the drawer opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the drawer closes. |

## Usage

```blade
<x-plume::drawer name="settings" title="User Settings" side="right">
    <x-plume::form ...>
        ...
    </x-plume::form>
</x-plume::drawer>

<x-plume::button @click="$openDrawer('settings')">Open Settings</x-plume::button>
```
