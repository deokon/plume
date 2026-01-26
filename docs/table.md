# Table

A standard HTML table with semantic styling and responsive overflow support.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `striped` | `bool` | `false` | Whether to alternate row colors. |
| `hoverable` | `bool` | `false` | Whether to highlight rows on hover. |
| `stickyHeader` | `bool` | `false` | Whether to keep the header visible when scrolling. |
| `density` | `string` | `'default'` | Spacing density: 'compact', 'default', 'loose'. |

## Usage

```blade
<x-plume::table striped hoverable>
    <x-plume::table.thead>
        <x-plume::table.tr>
            <x-plume::table.th>Name</x-plume::table.th>
            <x-plume::table.th>Email</x-plume::table.th>
        </x-plume::table.tr>
    </x-plume::table.thead>
    <x-plume::table.tbody>
        <x-plume::table.tr>
            <x-plume::table.td>John Doe</x-plume::table.td>
            <x-plume::table.td>john@example.com</x-plume::table.td>
        </x-plume::table.tr>
    </x-plume::table.tbody>
</x-plume::table>
```
