# Data Table Server-side

Handling large datasets with API-driven data fetching.

## Overview

When a `url` is provided, the Data Table shifts to server-side mode. It automatically handles fetching data, managing loading states, and sending pagination/sorting/search parameters to your API.

```blade
<x-plume::data-table url="/api/users" :paginated="true" searchable />
```

## API Parameters

The component sends the following query parameters:

- `page`: The current page number.
- `per_page`: Number of items requested.
- `search`: The search query string.
- `sort_col`: The key of the column being sorted.
- `sort_dir`: Direction (`asc` or `desc`).

## Server Response

Your API should return a JSON response with the following structure (you can use `DataTableResponse::make()`):

```json
{
    "success": true,
    "data": {
        "items": [...],
        "pagination": {
            "total": 100,
            "per_page": 10,
            "current_page": 1
        }
    }
}
```
