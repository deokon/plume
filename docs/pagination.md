# Pagination

A standalone pagination component that dispatches events on change.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `total` | `int` | `1` | Total number of pages. |
| `current` | `int` | `1` | Currently active page. |
| `onEachSide` | `int` | `1` | Number of page links to show on each side of the current page. |
| `model` | `string` | `null` | AlpineJS model name for the current page. |

## Usage

```blade
Simple Usage:
<x-plume::pagination :total="10" :current="1" />

Using model for reactivity:
<x-plume::form formData="{ 'page': 1 }">
    <x-plume::pagination :total="20" model="page" />
</x-plume::form>
```
