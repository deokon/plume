# Drawer

A panel that slides in from the edge of the screen.

## Overview

Drawers are useful for supplementary content, navigation, or complex forms that don't need a full-screen modal.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | **Required.** Unique identifier. |
| `side` | `string` | `'right'` | Slide direction: `left`, `right`, `top`, `bottom`. |
| `show` | `boolean` | `false` | Initial visibility state. |
| `title` | `string` | `null` | Header title. |
| `description` | `string` | `null` | Subtitle text. |

## Usage

### Basic Drawer

```blade
<x-plume::button @click="$openDrawer('my-drawer')">Open Drawer</x-plume::button>

<x-plume::drawer name="my-drawer" title="Settings" side="right">
    <p>Content goes here.</p>
    <x-slot:footer>
        <x-plume::button @click="close()" class="w-full">Close</x-plume::button>
    </x-slot:footer>
</x-plume::drawer>
```
