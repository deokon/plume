# Toast

Succinct messages displayed temporarily.

## Overview

Toasts provide non-intrusive feedback about an operation. They are managed via a global AlpineJS store (`$store.toasts`).

## Properties

The following options can be passed to the `$toast()`, `$success()`, or `$error()` helpers as the second argument:

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `type` | `string` | `'info'` | Semantic style: `info`, `success`, `error`, `warning`. |
| `title` | `string` | `null` | Bold title text displayed at the top. |
| `autoclose`| `bool` | `true` | If `false`, the toast will stay visible until dismissed manually. |
| `duration` | `int` | `3000` | Time in milliseconds before auto-closing (if `autoclose` is true). |

## Customization

### Global Configuration
To set a global default duration or position, you can configure the `x-plume::toaster` component in your layout:

```blade
<x-plume::toaster position="top-center" />
```

Available positions: `top-left`, `top-right`, `top-center`, `bottom-left`, `bottom-right`, `bottom-center`.

### Styling
Toasts use the `x-plume::alert` component internally. You can customize the look of all toasts by overriding the `alert` component or by passing custom classes via the `class` attribute on the `x-plume::toaster` (though this affects the container).

To customize individual toasts dynamically, you can use the global store's `items` array to render your own custom toast UI if the default `x-plume::toaster` doesn't meet your needs.

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
    duration: 5000
});
```
