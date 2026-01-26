# Form

A robust form container with AJAX submission, validation error handling, and reactive state binding.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | Submission URL. Auto-detected if using a <form> tag. |
| `method` | `string` | `'POST'` | HTTP method (GET, POST, PUT, PATCH, DELETE). |
| `formData` | `array|string|null` | `null` | Initial reactive data. Pass a PHP array or use Js::from(). |
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
Usage with automatic buttons:
<x-plume::form 
    action="/profile" 
    method="PUT" 
    :form-data="['name' => 'John', 'email' => 'john@example.com']"
    submit-button="Save Changes"
>
    <x-plume::form.input name="name" model="name" label="Name" />
    <x-plume::form.input name="email" model="email" label="Email" />
</x-plume::form>

Validation Error Handling:
When the server returns a 422 response with an 'errors' object, 
Plume automatically populates the form's error bag. 
Fields with matching 'model' names will display their respective error messages.
```
