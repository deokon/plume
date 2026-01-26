# Pagination

A standalone pagination component that dispatches events on change.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `total` | `int` | `1` | Total number of pages. |
| `current` | `int` | `1` | Currently active page. |
| `onEachSide` | `int` | `1` | Number of page links to show on each side of the current page. |

## Usage

```blade
Simple Usage:
<x-plume::pagination :total="10" :current="1" />

Listening for changes in AlpineJS:
<div x-data="{ page: 1 }">
    <x-plume::pagination 
        :total="20" 
        x-bind:data-current="page" 
        @plume-page-change="page = $event.detail.page; fetchNewData()" 
    />
</div>
```
