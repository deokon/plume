# Avatar

A circular or square image element with text fallback and optional status indicator.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | The URL of the avatar image. |
| `alt` | `string` | `''` | Accessibility text for the image. |
| `fallback` | `string` | `''` | Text to display if image fails to load (e.g., 'JD'). |
| `size` | `string` | `'md'` | Size of the avatar: 'xs', 'sm', 'md', 'lg', 'xl'. |
| `status` | `string` | `null` | Color for the status indicator: 'success', 'warning', 'error', 'info'. |
| `shape` | `string` | `'round'` | Shape of the avatar: 'round' (circle) or 'default' (rounded-md). |

## Usage

```blade
<x-plume::avatar 
    src="https://example.com/user.jpg" 
    fallback="JD" 
    status="success" 
    size="lg" 
/>
```
