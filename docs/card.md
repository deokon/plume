# Card

Displays a card with header, content, and footer.

## Overview

Cards are used to group related content or tasks into a single container. They support optional headers, footers, and badges.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | Header title. |
| `description` | `string` | `null` | Subtitle text. |
| `badge` | `string` | `null` | Optional badge text in header. |
| `badgeStyle` | `string` | `'default'` | Badge style variant. |

## Usage

### Standard Card

```blade
<x-plume::card title="Project Update" description="Last modified 2 days ago.">
    <p>Everything is on track for the v1.0 launch next month.</p>
</x-plume::card>
```

### Full Structure

```blade
<x-plume::card>
    <x-slot:header>
        <div class="flex items-center justify-between">
            <h3 class="font-bold">Custom Header</h3>
            <x-plume::badge>Beta</x-plume::badge>
        </div>
    </x-slot:header>

    <p>Body content goes here.</p>

    <x-slot:footer>
        <div class="flex justify-end gap-2">
            <x-plume::button style="outline">Cancel</x-plume::button>
            <x-plume::button>Save</x-plume::button>
        </div>
    </x-slot:footer>
</x-plume::card>
```
