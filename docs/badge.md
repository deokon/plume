# Badge

Displays a badge or a component that looks like a badge.

## Overview

Badges are used to highlight a status, category, or count. They come in several pre-defined styles and shapes.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `style` | `string` | `'default'` | `default`, `outline`, `secondary`, `destructive`, `success`, `warning`. |
| `size` | `string` | `'md'` | `sm`, `md`. |
| `shape` | `string` | `'default'` | `default` (rounded-md), `pill` (rounded-full). |

## Usage

### Styles

```blade
<x-plume::badge style="default">Default</x-plume::badge>
<x-plume::badge style="outline">Outline</x-plume::badge>
<x-plume::badge style="success">Success</x-plume::badge>
<x-plume::badge style="destructive">Destructive</x-plume::badge>
```

### Pill Shape

```blade
<x-plume::badge style="secondary" shape="pill">New Feature</x-plume::badge>
```
