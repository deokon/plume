# Accordion Item

An individual collapsible item within an accordion.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | The text displayed in the accordion header. |
| `id` | `string` | `null` | Unique identifier for the item. Auto-generated if not provided. |
| `open` | `bool` | `false` | Whether the item should be open by default. |

## Usage

```blade
<x-plume::accordion>
    <x-plume::accordion.item title="What is Plume?" id="faq-1" open>
        Plume is a UI library for Laravel and Alpine.js.
    </x-plume::accordion.item>
</x-plume::accordion>
```
