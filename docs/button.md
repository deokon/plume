# Button

Displays a button or a component that looks like a button.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `href` | `string` | `null` | URL to navigate to or submit to. Renders as an <a> tag unless $method is provided. |
| `method` | `string` | `null` | HTTP method for AJAX submission (POST, PUT, PATCH, DELETE). |
| `icon` | `string` | `null` | Iconify icon name (e.g., 'icon-[fluent--add-24-regular]'). |
| `fullWidth` | `bool` | `false` | Whether the button should take up the full width of its container. |
| `size` | `string` | `null` | Size of the button: 'sm', 'md', 'lg'. |
| `style` | `string` | `null` | Visual style: 'default', 'secondary', 'error', 'outline', 'ghost', 'link', 'minor'. |
| `shape` | `string` | `null` | Shape: 'default', 'pill', 'round'. |
| `confirm` | `string` | `null` | Native confirmation message to display before action. |
| `onSuccess` | `string` | `null` | AlpineJS expression or callback function to execute on success. |
| `onError` | `string` | `null` | AlpineJS expression or callback function to execute on error. |

## Usage

```blade
<x-plume::button style="primary" icon="icon-[fluent--save-24-regular]">Save Changes</x-plume::button>

<x-plume::button 
    href="/users/1" 
    method="DELETE" 
    confirm="Are you sure you want to delete this user?"
    onSuccess="$success('User deleted')">
    Delete User
</x-plume::button>
```
