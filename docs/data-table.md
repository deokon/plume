# Data Table

Advanced table with sorting, filtering, and pagination.

## Overview

The Data Table component provides a powerful way to manage and display large sets of data. It supports both local (client-side) data and remote (server-side) fetching.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `data` | `array` | `[]` | Static data for client-side mode. |
| `columns` | `array` | `[]` | **Required.** Column definitions (key, label, sortable). |
| `url` | `string` | `null` | API endpoint for server-side fetching. |
| `searchable` | `boolean` | `false` | Show search input. |
| `paginated` | `boolean` | `false` | Enable pagination. |
| `perPage` | `number` | `10` | Items per page. |
| `sortable` | `boolean` | `true` | Enable sorting globally. |
| `fixedHeight` | `boolean` | `false` | Maintain stable height during pagination. |

## Usage

### Client-side Data

```blade
<x-plume::data-table 
    :data="[['id' => 1, 'name' => 'John'], ['id' => 2, 'name' => 'Jane']]"
    :columns="[
        ['key' => 'id', 'label' => 'ID', 'sortable' => true],
        ['key' => 'name', 'label' => 'Name', 'sortable' => true]
    ]"
    searchable
    paginated
/>
```

### Server-side Fetching

When a `url` is provided, the component sends `page`, `per_page`, `search`, `sort_col`, and `sort_dir` parameters to your API.

```blade
<x-plume::data-table 
    url="/api/users"
    :columns="[...]"
    paginated
    fixed-height
/>
```

### API Response

Use `DataTableResponse` in your Laravel controller:

```php
use deokon\Plume\Http\Responses\DataTableResponse;

public function index(Request $request) {
    return DataTableResponse::fromPaginator(User::paginate(10));
}
```
