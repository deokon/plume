# Divider

A horizontal rule used to visually separate content sections, with optional text or icon labels.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `label` | `string` | `null` | Text label to display in the center of the divider. |

## Usage

```blade
<x-plume::divider />
<x-plume::divider label="OR" />
<x-plume::divider>
    <x-plume::icon i="icon-[fluent--star-24-regular]" />
</x-plume::divider>
```
