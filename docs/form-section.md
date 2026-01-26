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

### Multi-column Layout
Create complex layouts without writing custom grid classes for every field:
```blade
<x-plume::form.section 
    title="Personal Information" 
    description="This information will be displayed on your profile."
    :min-cols="1"
    :max-cols="2"
>
    <x-plume::form.input name="first_name" label="First Name" />
    <x-plume::form.input name="last_name" label="Last Name" />
    <x-plume::form.input name="email" label="Email" class="sm:col-span-2" />
</x-plume::form.section>
```
