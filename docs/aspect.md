# Aspect

A container component to maintain consistent proportions for media and content.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `ratio` | `string` | `'video'` | The aspect ratio: 'square' (1:1), 'video' (16:9), 'standard' (4:3), 'portrait' (3:4), 'cinema' (21:9), 'vertical' (9:16). Supports both '4/3' and '4:3' notations. |

## Usage

```blade
<x-plume::aspect ratio="square" class="max-w-xs">
    <img src="/photo.jpg" class="object-cover w-full h-full" />
</x-plume::aspect>
```
