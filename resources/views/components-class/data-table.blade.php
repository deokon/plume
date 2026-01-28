{{--
@component x-plume::data-table
@description Advanced table with sorting, filtering, and pagination. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.
@prop array $data (Default: []) Array of objects to display (client-side data).
@prop array $columns (Default: []) Column definitions: [{key: 'name', label: 'Name', sortable: true, cellClass: '...', headerClass: '...', constructed: '...'}].
@prop bool $searchable (Default: false) Whether to show a search input for filtering.
@prop bool $paginated (Default: false) Whether to enable pagination.
@prop int $perPage (Default: 10) Number of items per page.
@prop bool $sortable (Default: true) Whether to enable column sorting globally.
@prop string $url (Default: null) API endpoint URL for server-side fetching.
@prop bool $fixedHeight (Default: false) If true, maintains a minimum height based on perPage to prevent layout shifts.
@usage
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
--}}
<div x-data="dataTable({{ $perPage }}, {{ Js::from($paginated) }}, {{ Js::from($sortable) }}, {{ Js::from($url) }}, {{ Js::from($data) }}, {{ Js::from($columns) }}, {{ isset($__laravel_slots) ? Js::from(collect($__laravel_slots)->map(fn($s) => (string) $s)) : '{}' }})"
    {{ $attributes->merge(['class' => 'space-y-4 w-full']) }}>
    @if ($searchable)
        <div class="flex items-center justify-between px-4 pt-4">
            <x-plume::form.input x-model.debounce.300ms="search" placeholder="Search..."
                class="max-w-xs" icon="icon-[fluent--search-24-regular]" />
        </div>
    @endif

    <div class="relative"
        @if ($fixedHeight) style="min-height: calc(({{ $perPage }} * 53px) + 45px)" @endif>
        <div x-show="loading" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 z-10 flex items-center justify-center bg-background/50 backdrop-blur-[1px]">
            <x-plume::spinner class="size-8 text-primary" />
        </div>

        <x-plume::table>
            <x-plume::table.thead>
                <x-plume::table.tr>
                    <template x-for="col in columns" :key="col.key">
                        <x-plume::table.th ::class="(col.sortable !== false && sortable ?
                            'cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50 ' :
                            '') + (col.headerClass || '')"
                            @click="col.sortable !== false && sortable && toggleSort(col.key)">
                            <div class="flex items-center gap-2">
                                <span x-text="col.label"></span>

                                <template x-if="col.sortable !== false && sortable">
                                    <div
                                        class="flex flex-col text-foreground/40 dark:text-background-400/50 shrink-0 gap-y-1.5">
                                        <span
                                            class="icon icon-[fluent--caret-up-24-filled] size-3.5 -mb-1.5 transition-colors"
                                            :class="sortCol === col.key && sortDir === 'asc' ?
                                                'text-primary opacity-100' : ''"></span>
                                        <span
                                            class="icon icon-[fluent--caret-down-24-filled] size-3.5 -mt-1.5 transition-colors"
                                            :class="sortCol === col.key && sortDir === 'desc' ?
                                                'text-primary opacity-100' : ''"></span>
                                    </div>
                                </template>
                            </div>
                        </x-plume::table.th>
                    </template>
                </x-plume::table.tr>
            </x-plume::table.thead>
            <x-plume::table.tbody>
                <template x-for="(row, index) in pagedData" :key="row.id || row.uuid || index">
                    <x-plume::table.tr>
                        <template x-for="col in columns" :key="col.key">
                            <x-plume::table.td ::class="col.cellClass">
                                <template x-if="col.constructed">
                                    <div x-html="renderConstructed(col.constructed, row)"></div>
                                </template>
                                <template x-if="!col.constructed">
                                    <span x-text="row[col.key]"></span>
                                </template>
                            </x-plume::table.td>
                        </template>
                    </x-plume::table.tr>
                </template>
                <template x-if="filteredData.length === 0">
                    <x-plume::table.tr>
                        <x-plume::table.td ::colspan="columns.length" class="text-center py-12">
                            <x-plume::empty-state title="No results found"
                                description="Try adjusting your search or filters." />
                        </x-plume::table.td>
                    </x-plume::table.tr>
                </template>
            </x-plume::table.tbody>
        </x-plume::table>
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
