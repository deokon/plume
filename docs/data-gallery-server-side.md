# Data Gallery: Server-side

The Data Gallery can fetch data from an API endpoint, handling loading states and pagination automatically.

## Usage

When a `url` is provided, the gallery automatically handles fetching data from your API.

```blade
<x-plume::data-gallery
    url="/api/products"
    paginated
    searchable
    :per-page="10"
    cols="4"
>
    <x-plume::card>
        <img :src="item.image" class="w-full h-48 object-cover" />
        <div class="p-4">
            <h3 x-text="item.name" class="font-semibold"></h3>
            <span x-text="`$${item.price}`" class="font-bold text-primary mt-2 block"></span>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

## API Response Format

The server should return a JSON object compatible with `DataTableResponse`. This includes an `items` key for the data and a `pagination` object.

```json
{
    "success": true,
    "data": {
        "items": [...],
        "pagination": {
            "total": 50,
            "current_page": 1,
            "per_page": 10,
            "last_page": 5
        }
    }
}
```

You can use the `deokon\Plume\Http\Responses\DataTableResponse` class to easily generate this response:

```php
use deokon\Plume\Http\Responses\DataTableResponse;

public function index(Request $request)
{
    $query = Product::query();
    // ... filtering ...
    return DataTableResponse::fromPaginator($query->paginate($request->per_page));
}
```

## Refreshing Data

You can trigger a data refresh by calling the `fetch()` method on the component's AlpineJS object. This is useful after performing actions like deleting an item.

```blade
<x-plume::button
    @click="fetch()"
>
    Refresh Gallery
</x-plume::button>
```

### Refreshing from within a slot

Since items in the slot have access to the gallery context, you can call `fetch()` directly:

```blade
<x-plume::data-gallery url="/api/products">
    <x-plume::card>
        <h3 x-text="item.name"></h3>
        <x-plume::button @click="fetch()">
            Reload This Gallery
        </x-plume::button>
    </x-plume::card>
</x-plume::data-gallery>
```
