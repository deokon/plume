# Carousel

A slideshow component for cycling through elements.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `controls` | `bool` | `true` | Whether to show previous/next arrows. |
| `indicators` | `bool` | `false` | Whether to show dots indicating current slide. |
| `autoplay` | `bool` | `false` | Whether to automatically cycle through slides. |
| `interval` | `int` | `5000` | Duration in milliseconds between slide changes when autoplay is on. |
| `onSlideChange` | `string` | `null` | AlpineJS expression or function to call when the active slide changes. |

## Usage

```blade
<x-plume::carousel indicators autoplay>
    <x-plume::carousel.item>Slide 1</x-plume::carousel.item>
    <x-plume::carousel.item>Slide 2</x-plume::carousel.item>
</x-plume::carousel>
```
