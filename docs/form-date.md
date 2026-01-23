# Date Picker

A simple date picker input.

## Overview

The Date Picker component provides a consistent interface for selecting dates, wrapping the native browser date input with Plume styling.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `placeholder` | `string` | `''` | Input placeholder. |

## Usage

### Basic Usage

```blade
<x-plume::form.date 
    label="Birth Date" 
    model="birthDate" 
    name="dob" 
/>
```
