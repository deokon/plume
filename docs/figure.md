# Figure

Enhanced image component with captions and aspect ratio control.

## Overview

The Figure component wraps images with semantic metadata, providing optional captions and consistent aspect ratio management.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | **Required.** Image URL. |
| `alt` | `string` | `''` | Alt text. |
| `caption` | `string` | `null` | Figcaption text. |
| `aspect` | `string` | `null` | Aspect ratio (e.g., `video`, `square`). |

## Usage

### Simple Figure

```blade
<x-plume::figure 
    src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" 
    caption="A beautiful landscape."
    aspect="video"
    class="rounded-lg overflow-hidden"
/>
```
