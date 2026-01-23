# Divider

Visually separates content sections.

## Overview

Dividers are used to create logical breaks in layouts, supporting optional labels and custom icons.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Optional text label to display in the middle. |

## Usage

### Simple Divider

```blade
<x-plume::divider />
```

### With Label

```blade
<x-plume::divider label="OR" />
```

### With Custom Icon

```blade
<x-plume::divider>
    <x-plume::icon i="icon-[fluent--star-24-regular]" class="size-4" />
</x-plume::divider>
```
