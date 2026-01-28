# Aspect

A container component to maintain consistent proportions for media and content.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `ratio` | `string` | `'video'` | The aspect ratio: 'video' (16:9), 'square' (1:1), 'cinema' (21:9), '4/3', '3/4', '3/2', '2/3', '9/16'. Also accepts custom values like '2/1'. |

## Usage

```blade
<x-plume::aspect ratio="square" class="max-w-xs">
    <img src="/photo.jpg" class="object-cover w-full h-full" />
</x-plume::aspect>
```
