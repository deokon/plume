# Global Helpers

Plume UI provides several custom AlpineJS magic helpers (prefixed with `$`) to simplify common UI interactions.

## Modals & Drawers

Control overlays from any Alpine context without manually dispatching events.

| Helper | Description |
| :--- | :--- |
| `$openModal(name)` | Opens the modal with the given name. |
| `$closeModal(name?)` | Closes specific modal, or all modals if no name is provided. |
| `$openDrawer(name)` | Opens the drawer with the given name. |
| `$closeDrawer(name?)` | Closes specific drawer, or all drawers if no name is provided. |

### Usage Example

```blade
<x-plume::button @click="$openModal('user-profile')">
    Edit Profile
</x-plume::button>
```

## Toasts

Quickly trigger notifications without accessing the store directly.

| Helper | Description |
| :--- | :--- |
| `$toast(msg, options?)` | Add a new toast. |
| `$success(msg)` | Shorthand for a success-styled toast. |
| `$error(msg)` | Shorthand for a destructive-styled toast. |

### Toast Options

The second argument to `$toast()` is an optional object:

| Option | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `type` | `string` | `'info'` | One of: `'info'`, `'success'`, `'warning'`, `'error'`. |
| `title` | `string` | `null` | A bold heading for the toast. |
| `timeout` | `int` | `5000` | Duration in milliseconds before it auto-closes. |

### Usage Example

```blade
<x-plume::button @click="$toast('File uploaded', { type: 'success', title: 'Upload Complete' })">
    Upload
</x-plume::button>
```

## Clipboard

Programmatic access to the system clipboard.

| Helper | Description |
| :--- | :--- |
| `$copy(text)` | Copies the provided string to the clipboard. |

### Usage Example

```blade
<div x-data="{ coupon: 'SAVE20' }">
    <code x-text="coupon"></code>
    {{-- Simple usage --}}
    <x-plume::button @click="$copy(coupon); $success('Code copied!')">
        Copy
    </x-plume::button>
    
    {{-- Advanced usage with callback --}}
    <button @click="$copy(coupon).then(() => $success('Copied')).catch(() => $error('Failed'))">
        Copy
    </button>
</div>
```
