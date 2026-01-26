# Card

A versatile container for related content and actions, featuring semantic sections.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `null` | The main title for the card. |
| `description` | `string` | `null` | A brief description or subtitle. |
| `badge` | `string` | `null` | Text for an optional status badge in the header. |
| `badgeStyle` | `string` | `'default'` | The visual style of the badge. |
| `href` | `string` | `null` | If provided, renders the card as a clickable link. |

## Usage

```blade
<x-plume::card title="Project Alpha" description="Updated 2 hours ago" badge="In Progress">
    <p>Card content goes here.</p>
    <x-slot:footer>
        <x-plume::button size="sm">View Project</x-plume::button>
    </x-slot:footer>
</x-plume::card>
```
