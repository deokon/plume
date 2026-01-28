# Progress

A visual indicator of task completion or value within a range. Supports reactive AlpineJS binding.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `value` | `int` | `0` | The current completion value. Ignored if $model is provided. |
| `max` | `int` | `100` | The maximum value representing 100% completion. |
| `style` | `string` | `'default'` | Color style: 'default', 'secondary', 'error', 'success'. |
| `title` | `string` | `null` | Optional label text displayed above the bar. |
| `display` | `string` | `'percentage'` | How to display the value: 'percentage', 'number', 'outof', 'inside', 'none'. |
| `model` | `string` | `null` | AlpineJS model name for dynamic progress updates. |

## Usage

```blade
<x-plume::progress title="Uploading..." :value="45" :max="100" style="success" />

Reactive usage:
<div x-data="{ uploadProgress: 0 }">
    <x-plume::progress 
        title="Syncing" 
        model="uploadProgress" 
        display="inside" 
    />
</div>
```
