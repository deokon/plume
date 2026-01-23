# Table

A responsive table component.

## Overview

The Table component provides semantic wrappers for standard HTML table elements with built-in styling for density, stripes, and hover states.

## Properties

### Table (Container)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `striped` | `boolean` | `false` | Enable alternate row backgrounds. |
| `hoverable` | `boolean` | `false` | Highlight rows on hover. |
| `stickyHeader` | `boolean` | `false` | Keep the header visible when scrolling. |
| `density` | `string` | `'default'` | Padding level: `compact`, `default`, `loose`. |

### Table Cells (th/td)

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `align` | `string` | `'left'` | Text alignment: `left`, `center`, `right`. |

## Usage

### Basic Table

```blade
<x-plume::table striped hoverable>
    <x-plume::table.thead>
        <x-plume::table.tr>
            <x-plume::table.th>Name</x-plume::table.th>
            <x-plume::table.th>Role</x-plume::table.th>
            <x-plume::table.th align="right">Actions</x-plume::table.th>
        </x-plume::table.tr>
    </x-plume::table.thead>
    <x-plume::table.tbody>
        <x-plume::table.tr>
            <x-plume::table.td>John Doe</x-plume::table.td>
            <x-plume::table.td>Admin</x-plume::table.td>
            <x-plume::table.td align="right">
                <x-plume::button style="ghost" size="sm">Edit</x-plume::button>
            </x-plume::table.td>
        </x-plume::table.tr>
    </x-plume::table.tbody>
</x-plume::table>
```
