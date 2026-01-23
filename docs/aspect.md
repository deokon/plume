# Aspect Ratio

A container component to maintain consistent proportions for media and content.

## Overview

Aspect Ratio handles the scaling of content based on a ratio, ensuring that children (like images or videos) maintain their proportions across different screen sizes.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `ratio` | `string` | `'video'` | Predefined ratios: `video` (16/9), `square` (1/1), `cinema` (21/9), `portrait` (4/5). |

## Usage

### Video Embed

```blade
<div class="w-full max-w-lg">
    <x-plume::aspect ratio="video">
        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" class="h-full w-full rounded-lg"></iframe>
    </x-plume::aspect>
</div>
```

### Square Image

```blade
<div class="w-48">
    <x-plume::aspect ratio="square">
        <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8?auto=format&fit=crop&q=80&w=800&h=800" 
             alt="Photo" class="h-full w-full object-cover rounded-md" />
    </x-plume::aspect>
</div>
```
