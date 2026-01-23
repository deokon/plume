# Button

Displays a button or a component that looks like a button.

## Overview

Buttons allow users to take actions and make choices with a single tap. They can also act as links when an `href` is provided.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `style` | `string` | `'primary'` | `primary`, `secondary`, `outline`, `ghost`, `destructive`, `minor`. |
| `size` | `string` | `'md'` | `xs`, `sm`, `md`, `lg`, `xl`, `icon`. |
| `shape` | `string` | `'md'` | `square`, `md`, `lg`, `full`. |
| `href` | `string` | `null` | Destination URL (renders as `<a>`). |
| `icon` | `string` | `null` | Icon name to display. |
| `fullWidth` | `boolean` | `false` | Whether to expand to full container width. |

## Usage

### Styles

```blade
<x-plume::button style="primary">Primary</x-plume::button>
<x-plume::button style="secondary">Secondary</x-plume::button>
<x-plume::button style="outline">Outline</x-plume::button>
<x-plume::button style="ghost">Ghost</x-plume::button>
<x-plume::button style="destructive">Destructive</x-plume::button>
```

### With Icons

```blade
<x-plume::button icon="icon-[fluent--add-24-regular]">Add Item</x-plume::button>
<x-plume::button size="icon" icon="icon-[fluent--settings-24-regular]" aria-label="Settings" />
```
