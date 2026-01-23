# Number

A numeric input field.

## Overview

The Number component provides a styled input optimized for numeric values, with built-in support for range constraints and step intervals.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `min` | `number` | `null` | Minimum allowed value. |
| `max` | `number` | `null` | Maximum allowed value. |
| `step` | `number` | `null` | Value increment interval. |
| `placeholder` | `string` | `''` | Input placeholder. |

## Usage

### Basic Usage

```blade
<x-plume::form.number 
    label="Age" 
    model="age" 
    min="18" 
    max="99" 
    placeholder="Enter your age" 
/>
```
