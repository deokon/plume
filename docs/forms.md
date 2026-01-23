# Forms Overview

Standardize form state, validation, and submissions.

## Overview

Plume provides a comprehensive set of form components and a powerful Alpine.js plugin to manage state, validation, and AJAX submissions automatically.

## The Form Plugin

The `x-plume::form` component acts as a bridge between Blade and Alpine.js. It handles:
-   CSRF protection.
-   AJAX submission via Fetch API.
-   Success/Error state management.
-   UI feedback for processing states.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `action` | `string` | `''` | Form submission URL. |
| `method` | `string` | `'POST'` | HTTP method. |
| `formData` | `string` | `null` | Initial JS data object (JSON string). |
| `submitButton` | `string` | `null` | Label for auto-generated submit button. |
| `hideOnSuccess` | `boolean` | `false` | Whether to hide fields after success. |

## Usage

### Simple AJAX Form

```blade
<x-plume::form 
    action="/api/contact" 
    formData="{ name: '', message: '' }"
    submitButton="Send Message"
>
    <x-plume::form.input name="name" label="Name" model="name" />
    <x-plume::form.textarea name="message" label="Message" model="message" />
</x-plume::form>
```

### Standard Server Response

Use the `PlumeResponse` class in your Laravel controller:

```php
use deokon\Plume\Http\Responses\PlumeResponse;

public function store(Request $request) {
    // ... logic ...
    return PlumeResponse::success('Message sent!');
}
```
