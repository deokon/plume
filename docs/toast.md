# Toast

Succinct messages displayed temporarily.

## Overview

Toasts provide non-intrusive feedback about an operation. They are managed via a global AlpineJS store (`$store.toasts`).

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `position` | `string` | `'bottom-right'` | Position: `top-left`, `top-right`, `bottom-left`, `bottom-right`. |

## Usage

### Direct Component Usage

Normally, you only place the `x-plume::toaster` once in your layout (e.g., `app.blade.php`).

```blade
<x-plume::toaster position="top-right" />
```

### Triggering Toasts

You can trigger toasts using magic helpers or the store directly.

```blade
<x-plume::button @click="$success('Message sent!')">Success Toast</x-plume::button>
<x-plume::button @click="$error('Something went wrong.')">Error Toast</x-plume::button>

<!-- Manual usage with options -->
<x-plume::button @click="$toast('System alert', { type: 'warning', title: 'Caution' })">
    Warning
</x-plume::button>
```

### JavaScript API

```javascript
Alpine.store('toasts').add({
    type: 'success',
    title: 'Profile Updated',
    message: 'Your changes have been saved.',
    timeout: 5000
});
```
