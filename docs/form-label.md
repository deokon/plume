# Label

A label for a form input.

## Overview

The Label component provides consistent styling for form field labels, including an optional "required" indicator.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `for` | `string` | `null` | The ID of the associated input. |
| `required` | `boolean` | `false` | Whether to show a required asterisk. |

## Usage

### Basic Usage

```blade
<x-plume::form.label for="username">Username</x-plume::form.label>
<input id="username" type="text" />
```

### Required Field

```blade
<x-plume::form.label for="email" required>Email Address</x-plume::form.label>
<input id="email" type="email" />
```
