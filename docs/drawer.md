# Drawer

A panel that slides in from the edge of the screen. Closes when clicking the backdrop or pressing the ESC key unless 'persistent' is true.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | Unique identifier for the drawer, used with $openDrawer(name). |
| `show` | `bool` | `false` | Whether to show the drawer by default on page load. |
| `persistent` | `bool` | `false` | Whether to prevent closing when clicking the backdrop or pressing the ESC key. |
| `side` | `string` | `'right'` | Side to slide in from: 'left', 'right', 'top', 'bottom'. |
| `maxWidth` | `string` | `'sm'` | - |
| `title` | `string` | `null` | Simple title string. For complex headers, use the 'header' slot. |
| `description` | `string` | `null` | Optional subtitle or description. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the drawer opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the drawer closes. |

## Usage

### Basic Usage
```blade
<x-plume::drawer name="settings" title="User Settings" side="right">
    <x-plume::form ...>
        ...
    </x-plume::form>
</x-plume::drawer>

<x-plume::button @click="$openDrawer('settings')">Open Settings</x-plume::button>
```

### Multi-step Workflows
Drawers are ideal for side-panel workflows that don't want to lose page context:
```blade
<x-plume::drawer name="add-item" title="Add New Item">
    <x-plume::stepper ... />
</x-plume::drawer>
```
