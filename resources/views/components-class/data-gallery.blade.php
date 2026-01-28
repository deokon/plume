{{--
@component x-plume::data-gallery
@description Gallery grid layout for displaying collections of items with dynamic content via slots. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.
@prop array $data (Default: []) Array of objects to display (client-side data).
@prop bool $searchable (Default: false) Whether to show a search input for filtering.
@prop bool $paginated (Default: false) Whether to enable pagination.
@prop int $perPage (Default: 10) Number of items per page.
@prop string $url (Default: null) API endpoint URL for server-side fetching.
@prop int $cols (Default: 3) Shortcut to set responsive column distribution.
@prop int $minCols (Default: 1) Minimum number of grid columns on mobile.
@prop int $maxCols (Default: null) Maximum number of grid columns on large screens.
@prop int $gap (Default: 4) Gap spacing between items.
@usage
### Basic Usage
```blade
<x-plume::data-gallery :data="$products" paginated searchable :per-page="10">
    <x-plume::card>
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
    :per-page="10"
    cols="4"
>
    <!-- item content here -->
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
--}}
<div x-data="dataGallery({{ $perPage }}, {{ Js::from($paginated) }}, {{ Js::from($url) }}, {{ Js::from($data) }})"
    {{ $attributes->merge(['class' => 'space-y-4 w-full']) }}>
    @if ($searchable)
        <div class="flex items-center justify-between px-4 pt-4">
            <x-plume::form.input x-model.debounce.300ms="search" placeholder="Search..."
                class="max-w-xs" icon="icon-[fluent--search-24-regular]" />
        </div>
    @endif

    <div class="relative">
        <div x-show="loading" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 z-10 flex items-center justify-center bg-background/50 backdrop-blur-[1px]">
            <x-plume::spinner class="size-8 text-primary" />
        </div>

        <div class="{{ $gridClasses }} w-full">
            <template x-for="(item, index) in pagedData" :key="item.id || item.uuid || index">
                {{ $slot }}
            </template>
            <template x-if="filteredData.length === 0">
                <div class="col-span-full flex justify-center">
                    <x-plume::empty-state title="No items found"
                        description="Try adjusting your search or filters." />
                </div>
            </template>
        </div>
    </div>

    @if ($paginated)
        <div class="flex flex-col items-center gap-4 px-4 pb-4 sm:flex-row sm:justify-between">
            <div class="text-xs text-foreground/50 dark:text-background-400">
                Showing <span x-text="totalItems > 0 ? ((page - 1) * perPage) + 1 : 0"></span> to
                <span x-text="Math.min(page * perPage, totalItems)"></span> of
                <span x-text="totalItems"></span> results
            </div>
            <x-plume::pagination x-bind:data-total="totalPages" x-bind:data-current="page"
                @plume-page-change="page = $event.detail.page" />
        </div>
    @endif
</div>
