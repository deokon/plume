# Checkbox

A checkbox input for boolean selection.

## Overview

Checkboxes allow the user to select one or more items from a set, or to toggle a single setting on or off.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `checked` | `boolean` | `false` | Initial checked state. |

## Usage

### Basic Usage

```blade
<x-plume::form.checkbox 
    label="I agree to the terms and conditions" 
    model="agreed" 
    name="terms"
/>
```
