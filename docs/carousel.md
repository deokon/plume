# Carousel

A slideshow component for cycling through elements like a gallery of images or cards.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `autoplay` | `bool` | `false` | Whether the carousel should automatically cycle through slides. |
| `interval` | `int` | `3000` | The time delay between slides in milliseconds when autoplay is enabled. |
| `controls` | `bool` | `true` | - |
| `indicators` | `bool` | `true` | - |
| `model` | `string` | `null` | AlpineJS model name for the active slide index. |
| `onSlideChange` | `string` | `''` | AlpineJS expression or function to call when the active slide changes. |

## Usage

```blade
<x-plume::carousel :autoplay="true" :interval="5000" model="currentSlide">
    <x-plume::carousel.item>
        Slide 1 content...
    </x-plume::carousel.item>
    <x-plume::carousel.item>
        Slide 2 content...
    </x-plume::carousel.item>
</x-plume::carousel>
```
