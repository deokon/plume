# Breadcrumb Item

An individual link or active label within a breadcrumb trail.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `href` | `string` | `null` | The destination URL for the link. If null, the item renders as a span. |
| `active` | `bool` | `false` | Whether the item represents the current page. |

## Usage

```blade
<x-plume::breadcrumb.item href="/dashboard">Dashboard</x-plume::breadcrumb.item>
<x-plume::breadcrumb.item active>Settings</x-plume::breadcrumb.item>
```
