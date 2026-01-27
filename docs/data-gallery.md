# Data Gallery

Gallery grid layout for displaying collections of items with dynamic content via slots. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `data` | `array` | `[]` | Array of objects to display (client-side data). |
| `searchable` | `bool` | `false` | Whether to show a search input for filtering. |
| `paginated` | `bool` | `false` | Whether to enable pagination. |
| `perPage` | `int` | `12` | Number of items per page. |
| `url` | `string` | `null` | API endpoint URL for server-side fetching. |
| `cols` | `int` | `3` | Number of grid columns (1, 2, 3, or 4). |
| `gap` | `int` | `4` | Gap spacing between items. |

## Usage

### Basic Usage

Create a gallery with product cards:

```blade
<x-plume::data-gallery :data="$products" cols="3" gap="4">
    <x-plume::card class="overflow-hidden h-full flex flex-col">
        <img :src="item.image" class="w-full h-48 object-cover" alt="Product image" />
        <div class="p-4 flex flex-col flex-grow">
            <h3 x-text="item.name" class="font-semibold text-lg"></h3>
            <p x-text="item.description" class="text-sm text-foreground/60 flex-grow"></p>
            <span x-text="`$${item.price}`" class="font-bold text-primary mt-2 block"></span>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

### With Search and Pagination

Enable search and pagination for large collections:

```blade
<x-plume::data-gallery
    :data="$products"
    searchable
    paginated
    :per-page="12"
    cols="3"
    gap="4"
>
    <x-plume::card class="overflow-hidden h-full flex flex-col">
        <img :src="item.image" class="w-full h-48 object-cover" />
        <div class="p-4">
            <h3 x-text="item.name" class="font-semibold"></h3>
            <p x-text="item.description" class="text-sm text-foreground/60"></p>
            <span x-text="`$${item.price}`" class="font-bold text-primary mt-2 block"></span>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

### Server-side Data

When a `url` is provided, the gallery automatically handles fetching data from your API:

```blade
<x-plume::data-gallery
    url="/api/products"
    paginated
    searchable
    :per-page="15"
    cols="4"
    gap="6"
>
    <x-plume::card>
        <img :src="item.image" class="w-full h-48 object-cover" />
        <div class="p-4">
            <h3 x-text="item.name"></h3>
            <p x-text="item.description" class="text-sm text-foreground/60"></p>
            <span x-text="`$${item.price}`" class="font-bold text-primary mt-2 block"></span>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

Expected API response format:
```json
{
    "success": true,
    "data": {
        "items": [
            { "id": 1, "name": "Product 1", "description": "...", "price": 29.99, "image": "..." },
            { "id": 2, "name": "Product 2", "description": "...", "price": 39.99, "image": "..." }
        ],
        "pagination": {
            "total": 100,
            "per_page": 15,
            "page": 1
        }
    }
}
```

### Refreshing Data

Call `fetch()` from any interactive element within the gallery to refresh its content:

```blade
<x-plume::data-gallery url="/api/products" :data="$products">
    <x-plume::card>
        <img :src="item.image" class="w-full h-48 object-cover" />
        <div class="p-4 flex flex-col">
            <h3 x-text="item.name" class="font-semibold"></h3>
            <x-plume::button
                size="sm"
                class="mt-auto"
                @click="fetch()"
            >
                Add to Cart
            </x-plume::button>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

### Responsive Columns

Adjust the number of columns based on your layout needs:

```blade
{{-- 2-column layout --}}
<x-plume::data-gallery :data="$products" cols="2" gap="6">
    ...
</x-plume::data-gallery>

{{-- 4-column layout --}}
<x-plume::data-gallery :data="$products" cols="4" gap="4">
    ...
</x-plume::data-gallery>

{{-- Single column --}}
<x-plume::data-gallery :data="$products" cols="1" gap="4">
    ...
</x-plume::data-gallery>
```

### Complex Item Content

The slot receives the current `item` object and supports full Blade syntax:

```blade
<x-plume::data-gallery :data="$products" searchable paginated :per-page="12">
    <x-plume::card class="group overflow-hidden h-full">
        <div class="relative overflow-hidden bg-background-100 dark:bg-background-900">
            <img :src="item.image" class="w-full h-48 object-cover group-hover:scale-105 transition-transform" />
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <x-plume::button style="primary" size="sm">View Details</x-plume::button>
            </div>
        </div>
        <div class="p-4">
            <h3 x-text="item.name" class="font-semibold text-lg mb-2"></h3>
            <p x-text="item.description" class="text-sm text-foreground/60 mb-3"></p>
            <div class="flex items-center justify-between">
                <span x-text="`$${item.price}`" class="font-bold text-primary"></span>
                <div class="flex gap-1">
                    <template x-for="i in 5" :key="i">
                        <span class="icon icon-[fluent--star-24-filled] size-4 text-yellow-500"></span>
                    </template>
                </div>
            </div>
        </div>
    </x-plume::card>
</x-plume::data-gallery>
```

## Notes

- The slot content is repeated for each item in your data array
- Access current item properties using Alpine's direct binding syntax (e.g., `:src="item.image"`, `x-text="item.name"`)
- The component automatically handles filtering by any field when `searchable` is enabled
- Pagination is calculated based on the `perPage` property
- When using server-side data with a `url`, the API response must match the expected format shown above
