# Range

A slider input for selecting a value within a range.

## Overview

The Range component provides a visual slider for users to select a numeric value from a defined interval.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Header label text. |
| `name` | `string` | `null` | HTML name attribute. |
| `model` | `string` | `null` | AlpineJS model name. |
| `min` | `number` | `0` | Minimum value. |
| `max` | `number` | `100` | Maximum value. |
| `step` | `number` | `1` | Increment interval. |

## Usage

### Basic Usage

```blade
<x-plume::form.range 
    label="Volume" 
    model="volume" 
    min="0" 
    max="100" 
/>
```
