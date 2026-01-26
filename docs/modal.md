# Modal

A dialog box or popup window that is displayed on top of the current page.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | Unique identifier for the modal, used with $openModal(name). |
| `show` | `bool` | `false` | Whether to show the modal by default on page load. |
| `maxWidth` | `string` | `'2xl'` | Maximum width: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl', 'full'. |
| `title` | `string` | `null` | Simple title string. For complex headers, use the 'header' slot. |
| `onOpen` | `string` | `null` | AlpineJS expression or function to call when the modal opens. |
| `onClose` | `string` | `null` | AlpineJS expression or function to call when the modal closes. |

## Usage

```blade
<x-plume::modal name="login-modal" title="Welcome Back">
    <x-plume::form ...>
        ...
    </x-plume::form>
</x-plume::modal>

<x-plume::button @click="$openModal('login-modal')">Login</x-plume::button>
```
