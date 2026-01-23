# Password

A secure password input field.

## Overview

The Password component provides a styled input for sensitive information, including a default "lock" icon and standard security features.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `placeholder` | `string` | `''` | Input placeholder. |
| `icon` | `string` | `'icon-[fluent--lock-closed-24-regular]'` | Leading icon name. |

## Usage

### Basic Usage

```blade
<x-plume::form.password 
    label="Password" 
    model="password" 
    placeholder="Choose a strong password" 
/>
```
