# Avatar

An image element with a fallback for representing the user.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `src` | `string` | `null` | - |
| `alt` | `string` | `''` | - |
| `fallback` | `string` | `''` | - |
| `size` | `string` | `'md'` | - |
| `status` | `string` | `null` | - |
| `shape` | `string` | `'round'` | - |

## Usage

```blade
<x-plume::avatar src="https://github.com/shadcn.png" fallback="JD" />
```
