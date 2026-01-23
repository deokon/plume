# Avatar

An image element with a fallback for representing the user.

## Overview

Avatars are used to represent people or entities in your application. They support fallbacks for missing images, various shapes, and status indicators.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | Image URL. |
| `alt` | `string` | `''` | Alt text for the image. |
| `fallback` | `string` | `''` | Text initials to show if image is missing. |
| `size` | `string` | `'md'` | `xs`, `sm`, `md`, `lg`, `xl`, `2xl`. |
| `status` | `string` | `null` | Indicator: `online`, `offline`, `away`, `busy`. |
| `shape` | `string` | `'round'` | `round` (circle), `square`. |

## Usage

### Sizes

```blade
<x-plume::avatar src="https://github.com/deokon.png" size="xs" />
<x-plume::avatar src="https://github.com/deokon.png" size="sm" />
<x-plume::avatar src="https://github.com/deokon.png" size="md" />
<x-plume::avatar src="https://github.com/deokon.png" size="lg" />
<x-plume::avatar src="https://github.com/deokon.png" size="xl" />
```

### Fallbacks & Status

```blade
<x-plume::avatar fallback="DO" />
<x-plume::avatar src="https://github.com/deokon.png" status="online" />
```

### Shapes

```blade
<x-plume::avatar src="https://github.com/deokon.png" shape="square" />
```
