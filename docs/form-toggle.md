# Toggle

A toggle switch for boolean selection.

## Overview

The Toggle component is a modern alternative to a checkbox, typically used for binary settings like "Enable Notifications".

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `checked` | `boolean` | `false` | Initial state. |

## Usage

### Basic Usage

```blade
<x-plume::form.toggle 
    label="Enable dark mode" 
    model="darkMode" 
    name="theme_mode"
/>
```
