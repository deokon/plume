# Gallery

Responsive grid layout for images and figures.

## Overview

The Gallery component simplifies the creation of responsive image grids, automatically handling column counts and spacing.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `cols` | `number` | `3` | Number of columns on large screens. |
| `gap` | `number` | `4` | Spacing between items (Tailwind spacing unit). |

## Usage

### Simple Grid

```blade
<x-plume::gallery :cols="4">
    <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" class="rounded-lg" />
    <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" class="rounded-lg" />
    <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" class="rounded-lg" />
    <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" class="rounded-lg" />
</x-plume::gallery>
```
