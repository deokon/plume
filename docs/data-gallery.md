# Data Gallery

Gallery grid layout for displaying collections of items with dynamic content via slots. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.

## Properties

| Prop | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `data` | `array` | `[]` | Array of objects to display (client-side data). |
| `searchable` | `bool` | `false` | Whether to show a search input for filtering. |
| `paginated` | `bool` | `false` | Whether to enable pagination. |
| `perPage` | `int` | `10` | Number of items per page. |
| `url` | `string` | `null` | API endpoint URL for server-side fetching. |
| `cols` | `int` | `3` | Shortcut to set responsive column distribution. |
| `gap` | `int` | `4` | Gap spacing between items. |
| `minCols` | `int` | `null` | Minimum number of grid columns on mobile. |
| `maxCols` | `int` | `null` | Maximum number of grid columns on large screens. |

## Usage

### Basic Usage
```blade
<x-plume::data-gallery :data="$products" paginated searchable :per-page="10">
    <x-slot:default>
        <x-plume::card>
            <img :src="item.image" class="w-full h-48 object-cover" />
            <div class="p-4">
                <h3 x-text="item.name" class="font-semibold"></h3>
                <p x-text="item.description" class="text-sm text-foreground/60"></p>
                <span x-text="`$${item.price}`" class="font-bold text-primary mt-2 block"></span>
            </div>
        </x-plume::card>
    </x-slot:default>
</x-plume::data-gallery>
```

### Server-side Data
When a `url` is provided, the gallery automatically handles fetching data from your API:
```blade
<x-plume::data-gallery
    url="/api/products"
    paginated
    searchable
    :per-page="10"
    cols="4"
>
    <x-slot:default>
        <!-- item content here -->
    </x-slot:default>
</x-plume::data-gallery>
```

### Refreshing Data
Call `fetch()` from any interactive element within the gallery to refresh its content:
```blade
<x-plume::button
    @click="fetch()"
>
    Refresh
</x-plume::button>
```
