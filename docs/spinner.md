# Spinner

A CSS-animated loading indicator for indicating background processes or data fetching.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `size` | `string` | `'md'` | Size of the spinner: 'xs', 'sm', 'md', 'lg', 'xl'. |
| `style` | `string` | `'primary'` | Color style: 'primary', 'secondary', 'error', 'white'. |

## Usage

```blade
<x-plume::spinner size="lg" style="primary" />
<x-plume::button disabled>
    <x-plume::spinner size="xs" style="white" class="mr-2" />
    Processing...
</x-plume::button>
```
