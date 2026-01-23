# Modal

A dialog box or popup window that is displayed on top of the current page.

## Overview

Modals are used for focused interactions that require user attention without navigating away from the current context.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `name` | `string` | `null` | **Required.** Unique identifier. |
| `show` | `boolean` | `false` | Initial visibility state. |
| `maxWidth` | `string` | `'2xl'` | Max width: `sm`, `md`, `lg`, `xl`, `2xl`. |
| `title` | `string` | `null` | Optional header title. |

## Usage

### Basic Usage

```blade
<x-plume::button @click="$openModal('user-modal')">Open Modal</x-plume::button>

<x-plume::modal name="user-modal" title="User Details">
    <p>Content goes here.</p>
    <x-slot:footer>
        <x-plume::button @click="close()">Close</x-plume::button>
    </x-slot:footer>
</x-plume::modal>
```
