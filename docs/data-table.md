# Data Table

Advanced table with sorting, filtering, and pagination. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `data` | `array` | `[]` | Array of objects to display (client-side data). |
| `columns` | `array` | `[]` | Column definitions: [{key: 'name', label: 'Name', sortable: true, cellClass: '...', headerClass: '...', constructed: '...'}]. |
| `searchable` | `bool` | `false` | Whether to show a search input for filtering. |
| `paginated` | `bool` | `false` | Whether to enable pagination. |
| `perPage` | `int` | `10` | Number of items per page. |
| `sortable` | `bool` | `true` | Whether to enable column sorting globally. |
| `url` | `string` | `null` | API endpoint URL for server-side fetching. |
| `fixedHeight` | `bool` | `false` | If true, maintains a minimum height based on perPage to prevent layout shifts. |

## Usage

### Basic Usage
```blade
@php
    $cols = [
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
        ['key' => 'email', 'label' => 'Email', 'sortable' => true],
        ['key' => 'role', 'label' => 'Role', 'constructed' => '<span class="badge text-xs uppercase">{role}</span>']
    ];
@endphp

<x-plume::data-table 
    :columns="$cols" 
    :data="$users" 
    searchable 
    paginated 
    :per-page="15" 
/>
```

### Server-side Data
When a `url` is provided, the table automatically handles fetching data from your API:
```blade
<x-plume::data-table 
    url="/api/users" 
    :columns="$cols"
    paginated 
    searchable 
/>
```

### Refreshing Data
Call `fetch()` from any interactive element within the table to refresh its content:
```blade
<x-plume::button 
    method="DELETE" 
    :href="route('users.destroy', $user)" 
    onSuccess="fetch()"
>
    Delete
</x-plume::button>
```

### Performance Tip
Use **Constructed Columns** for simple HTML formatting to keep the table snappy. Use **Slots** only when you need complex Blade components in your cells.
