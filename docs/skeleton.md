# Skeleton

Placeholder for content that is loading.

## Overview

Skeletons are used to provide a visual indication that content is loading, helping to reduce perceived wait times and prevent layout shifts.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `shape` | `string` | `'rect'` | `rect`, `circle`, `text`. |
| `animation` | `string` | `'pulse'` | `pulse`, `shimmer`, `none`. |

## Usage

### Simple Card Placeholder

```blade
<div class="space-y-4 w-64">
    <x-plume::skeleton shape="circle" class="size-12" />
    <div class="space-y-2">
        <x-plume::skeleton shape="text" class="w-full" />
        <x-plume::skeleton shape="text" class="w-2/3" />
    </div>
</div>
```
