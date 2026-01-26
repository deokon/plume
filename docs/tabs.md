# Tabs

A set of layered sections of content, known as tab panels, that are displayed one at a time.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `default` | `string` | `'1'` | The key of the tab to be active by default. |
| `side` | `string` | `'top'` | Side to display the tab list: 'top', 'bottom', 'left', 'right'. |
| `size` | `string` | `'md'` | Size of the tabs: 'sm', 'md', 'lg'. |
| `style` | `string` | `'default'` | Visual style: 'default', 'pill', 'outline'. |
| `shape` | `string` | `'default'` | Shape: 'default', 'round', 'square'. |
| `onTabChange` | `string` | `null` | AlpineJS expression or function to call when the active tab changes. |

## Usage

```blade
<x-plume::tabs default="profile">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="profile">Profile</x-plume::tabs.item>
        <x-plume::tabs.item for="settings">Settings</x-plume::tabs.item>
    </x-plume::tabs.group>
    
    <x-plume::tabs.panel name="profile">
        Profile Content
    </x-plume::tabs.panel>
    <x-plume::tabs.panel name="settings">
        Settings Content
    </x-plume::tabs.panel>
</x-plume::tabs>
```
