# Calendar

A visual calendar interface for selecting dates.

## Overview

The Calendar component provides an interactive interface for date selection, supporting various modes and range constraints.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `model` | `string` | `null` | AlpineJS model name for the selected date. |
| `min` | `string` | `null` | Minimum selectable date (YYYY-MM-DD). |
| `max` | `string` | `null` | Maximum selectable date (YYYY-MM-DD). |
| `mode` | `string` | `'single'` | `single`, `range`. |

## Usage

### Basic Usage

```blade
<div x-data="{ myDate: '' }">
    <x-plume::calendar model="myDate" />
    <p class="mt-4">Selected: <span x-text="myDate"></span></p>
</div>
```

### Constraints

```blade
<x-plume::calendar min="2024-01-01" max="2024-12-31" />
```
