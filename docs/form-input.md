# Input

Standard text input fields.

## Overview

The Input component provides a styled text field with support for labels, error handling, and icons. It's built to work seamlessly with the Plume Form plugin.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `id` | `string` | `null` | HTML id attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `type` | `string` | `'text'` | `text`, `email`, `tel`, `url`. |
| `placeholder` | `string` | `''` | Input placeholder. |
| `icon` | `string` | `null` | Leading icon name. |

## Usage

### Basic Usage

```blade
<x-plume::form.input 
    label="Full Name" 
    name="name" 
    model="name" 
    placeholder="Enter your name" 
/>
```

### With Icon

```blade
<x-plume::form.input 
    label="Email Address" 
    type="email" 
    icon="icon-[fluent--mail-24-regular]"
    model="email" 
/>
```
