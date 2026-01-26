# Empty State

A placeholder component to show when a list, table, or page has no data.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `title` | `string` | `'No results found'` | The main heading text. |
| `description` | `string` | `null` | Helpful text or instructions for the user. |
| `icon` | `string` | `'icon-[fluent--search-info-24-regular]'` | Iconify icon name. |

## Usage

```blade
<x-plume::empty-state 
    title="No items in cart" 
    description="Your shopping cart is currently empty. Start adding some products!"
    icon="icon-[fluent--cart-24-regular]"
>
    <x-plume::button href="/shop">Browse Products</x-plume::button>
</x-plume::empty-state>
```
