# Form

A robust form container with AJAX submission, validation error handling, and success feedback.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | Submission URL. Auto-detected if empty and using a <form> tag. |
| `method` | `string` | `'POST'` | HTTP method (GET, POST, PUT, PATCH, DELETE). |
| `formData` | `array|string|null` | `null` | Initial data for the form. Can be a PHP array or a JS object string. |
| `submitButton` | `string` | `null` | Label for an automatic primary submit button with a loader. |
| `resetButton` | `string` | `null` | Label for an automatic reset button. |
| `hideOnSuccess` | `bool` | `false` | Whether to hide the form content after a successful submission. |
| `resetOnSuccess` | `bool` | `false` | Whether to reset the form data to initial state after success. |
| `onSuccess` | `string` | `null` | AlpineJS expression or callback function to execute on success. |
| `onError` | `string` | `null` | AlpineJS expression or callback function to execute on error. |
| `showAlerts` | `bool` | `true` | Whether to automatically show success/error alerts. |
| `inline` | `bool` | `false` | Renders form elements in a horizontal flex layout. |

## Usage

```blade
<x-plume::form 
    action="/profile" 
    method="PUT" 
    :form-data="$user"
    submit-button="Update Profile"
    onSuccess="$success('Profile saved!')"
>
    <x-plume::form.input name="name" label="Full Name" />
    <x-plume::form.input name="email" label="Email Address" />
</x-plume::form>
```
