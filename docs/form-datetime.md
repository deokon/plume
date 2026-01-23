# DateTime Picker

A date and time picker input.

## Overview

The DateTime Picker component allows users to select both a date and a specific time, styled to match the Plume design system.

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
<x-plume::form.datetime 
    label="Event Start" 
    model="eventTime" 
    name="starts_at" 
/>
```
