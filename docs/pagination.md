# Pagination

Displays a sequence of links for navigating through related pages.

## Overview

The Pagination component provides interactive links for browsing large sets of data, supporting custom page counts and surrounding context.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `total` | `number` | `1` | Total number of pages. |
| `current` | `number` | `1` | Current active page. |
| `onEachSide` | `number` | `1` | How many page links to show beside the current page. |

## Usage

### Basic Usage

```blade
<div x-data="{ page: 1 }">
    <x-plume::pagination 
        :total="10" 
        :current="page" 
        @change="page = $event.detail.page" 
    />
</div>
```
