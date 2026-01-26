# Calendar

A visual calendar interface for selecting dates.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `model` | `string` | `null` | AlpineJS model name for the selected date(s). |
| `value` | `mixed` | `null` | Initial value for the calendar. |
| `min` | `string` | `null` | Minimum selectable date (YYYY-MM-DD). |
| `max` | `string` | `null` | Maximum selectable date (YYYY-MM-DD). |
| `mode` | `string` | `'single'` | Selection mode: 'single' or 'range'. |
| `onDateSelect` | `string` | `null` | AlpineJS expression or function to call when a date is selected. |

## Usage

```blade
<x-plume::calendar 
    model="bookingDate" 
    min="2024-01-01" 
    max="2024-12-31" 
    mode="range" 
/>
```
