# Carousel

A slideshow component for cycling through elements.

## Overview

Carousels are ideal for displaying a collection of images or content panels in a space-saving slideshow format.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `controls` | `boolean` | `true` | Show prev/next navigation buttons. |
| `indicators` | `boolean` | `false` | Show bottom position indicators. |
| `autoplay` | `boolean` | `false` | Enable automatic slide transitions. |
| `interval` | `number` | `5000` | Duration between slides in ms. |

## Usage

### Basic Image Slider

```blade
<x-plume::carousel class="w-full max-w-2xl" indicators>
    <x-plume::carousel.item>
        <img src="https://images.unsplash.com/photo-1588345921523-c2d6c9f10ee8" class="rounded-xl" alt="Nature" />
    </x-plume::carousel.item>
    <x-plume::carousel.item>
        <div class="flex h-64 items-center justify-center bg-secondary rounded-xl">
            <span class="text-2xl font-bold">Custom Content Slide</span>
        </div>
    </x-plume::carousel.item>
</x-plume::carousel>
```
