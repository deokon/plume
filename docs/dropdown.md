# Dropdown

Displays a menu to the user—such as a set of actions or functions—triggered by a button.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `trigger` | `string` | `null` | The text or slot content for the dropdown trigger button. |
| `align` | `string` | `'right'` | Alignment of the dropdown menu: 'left', 'right', 'top'. |
| `width` | `string` | `'md'` | Width of the menu: 'xs', 'sm', 'md', 'lg', 'xl', or custom CSS width class. |
| `contentClasses` | `string` | `'bg-background dark:bg-background-800'` | Additional classes for the menu container. |
| `triggerStyle` | `string` | `'outline'` | Visual style of the automatic trigger button: 'primary', 'secondary', 'error', 'outline', 'ghost', 'link', 'minor'. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the dropdown opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the dropdown closes. |

## Usage

```blade
<x-plume::dropdown trigger="Actions" align="right" width="sm">
    <x-plume::dropdown.item href="/edit">Edit</x-plume::dropdown.item>
    <x-plume::dropdown.item href="/delete" class="text-error">Delete</x-plume::dropdown.item>
</x-plume::dropdown>
```
