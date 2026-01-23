# Icon

Displays an icon from the Iconify library.

## Overview

Plume uses Iconify for a unified icon system. This component provides a clean wrapper for rendering icons with custom classes.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `i` | `string` | `null` | **Required.** Iconify identifier (e.g., `icon-[fluent--home-24-regular]`). |

## Usage

### Basic Usage

```blade
<x-plume::icon i="icon-[fluent--star-24-regular]" class="size-6 text-primary" />
```
