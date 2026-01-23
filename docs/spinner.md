# Spinner

A loading indicator.

## Overview

Spinners are used to indicate that an action or a content section is being processed.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `size` | `string` | `'md'` | `sm`, `md`, `lg`, `xl`. |
| `style` | `string` | `'primary'` | Tailwind color variant. |

## Usage

### Sizes

```blade
<x-plume::spinner size="sm" />
<x-plume::spinner size="md" />
<x-plume::spinner size="lg" />
```

### With Custom Colors

```blade
<x-plume::spinner style="destructive" />
<x-plume::spinner class="text-success" />
```
