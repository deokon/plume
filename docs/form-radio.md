# Radio

A radio button for single selection.

## Overview

Radio buttons are used when a user needs to select exactly one option from a list of predefined choices.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `value` | `string` | `''` | Value of the radio button. |
| `checked` | `boolean` | `false` | Initial state. |

## Usage

### Basic Group

```blade
<div x-data="{ plan: 'basic' }">
    <x-plume::form.radio label="Basic Plan" name="plan" value="basic" model="plan" />
    <x-plume::form.radio label="Pro Plan" name="plan" value="pro" model="plan" />
</div>
```
