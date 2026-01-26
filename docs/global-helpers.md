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
| `$copy(text)` | Copies the provided string to the clipboard. Returns a Promise. |

### Usage Example

```blade
<div x-data="{ coupon: 'SAVE20' }">
    {{-- Simple usage --}}
    <x-plume::button @click="$copy(coupon); $success('Code copied!')">
        Copy
    </x-plume::button>
</div>
```

### Advanced Patterns & Error Handling
Since `$copy()` returns a Promise, you can chain it to handle success or failure (e.g., if the user denies clipboard permissions):

```blade
<button @click="$copy(text).then(() => $success('Copied')).catch(() => $error('Copy failed'))">
    Copy
</button>
```

## Async Patterns
Most magic helpers that perform actions (like `$copy()` or `$openModal()`) can be used in async sequences. While `$openModal` is synchronous in its execution, it triggers transitions that you may want to wait for if performing further DOM manipulations.

```blade
<button @click="
    await $copy(text);
    $success('Text Copied');
    $closeModal('copy-dialog');
">
    Confirm Copy
</button>
```

> **Note:** Chaining multiple helpers with semicolons works fine for most cases. Use `.then()` or `await` only when you need to ensure the previous action (like an async clipboard operation) has completed before proceeding.
