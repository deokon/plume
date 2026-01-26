# Form Section

A titled section for organizing form fields into semantic groups with optional grid layout.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | The section title. |
| `description` | `string` | `null` | Optional text to describe the section's purpose. |
| `minCols` | `int` | `1` | Number of columns on small screens. |
| `maxCols` | `int` | `null` | Number of columns on large screens. Defaults to minCols if not set. |

## Usage

```blade
<x-plume::form.section 
    title="Security" 
    description="Update your password and login settings."
    :min-cols="1"
    :max-cols="2"
>
    <x-plume::form.input name="password" type="password" label="New Password" />
    <x-plume::form.input name="password_confirmation" type="password" label="Confirm Password" />
</x-plume::form.section>
```
