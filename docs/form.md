# Form

A collection of form components for user input.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | - |
| `method` | `string` | `'POST'` | - |
| `formData` | `array|string|null` | `null` | - |
| `submitButton` | `string` | `null` | - |
| `resetButton` | `string` | `null` | - |
| `hideOnSuccess` | `bool` | `false` | - |
| `resetOnSuccess` | `bool` | `false` | - |
| `onSuccess` | `string` | `null` | AlpineJS expression or function to call on success. Access result via `result`. |
| `onError` | `string` | `null` | AlpineJS expression or function to call on error. Access error via `result`. |
| `inline` | `bool` | `false` | - |

## Callbacks

You can provide `onSuccess` and `onError` callbacks as AlpineJS expressions. These have access to the server response via the `result` variable.

```blade
<x-plume::form 
    action="/api/user" 
    onSuccess="console.log('Saved user:', result.data.id)"
    onError="$toast(result.message, { style: 'error' })"
>
    ...
</x-plume::form>
```

