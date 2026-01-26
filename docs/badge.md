# Badge

Displays a small, styled label for status, counts, or categorization.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `style` | `string` | `'default'` | Visual style: 'default', 'secondary', 'error', 'outline', 'success'. |
| `size` | `string` | `'md'` | Size of the badge: 'sm', 'md', 'lg'. |
| `shape` | `string` | `'default'` | Shape: 'default' (rounded), 'pill', 'square'. |

## Usage

```blade
<x-plume::badge style="success" shape="pill">Active</x-plume::badge>
<x-plume::badge style="outline" size="sm">v1.0.0</x-plume::badge>
```
