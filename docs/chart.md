# Chart

Basic chart component for data visualization.

## Overview

The Chart component provides simple SVG-based visualizations for data series, supporting bar and line types.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `type` | `string` | `'bar'` | `bar`, `line`. |
| `data` | `array` | `[]` | Array of numbers or objects `{ label, value }`. |
| `height` | `number` | `200` | Height in pixels. |
| `color` | `string` | `'text-primary'` | Tailwind text color class for the series. |

## Usage

### Simple Bar Chart

```blade
<x-plume::chart 
    :data="[10, 45, 30, 70, 25, 90]" 
    color="text-primary" 
    height="150" 
/>
```
