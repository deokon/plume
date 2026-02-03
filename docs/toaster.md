# Toaster

A container for temporary notification messages (Toasts). Triggered via global magic helpers.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `position` | `string` | `'bottom-right'` | Position of the toast stack: 'top-left', 'top-right', 'top-center', 'bottom-left', 'bottom-right', 'bottom-center'. |

## Usage

```blade
Place once in your main layout file
<x-plume::toaster position="top-right" />

Trigger from anywhere using global helpers
<button @click="$success('Profile Saved!')">Save</button>
<button @click="$error('Action failed')">Delete</button>
<button @click="$toast('New message', { type: 'info', timeout: 3000, onShow: 'console.log(\'show\')', onDismiss: 'console.log(\'dismiss\')' })">Notify</button>
```
