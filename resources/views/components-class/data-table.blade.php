{{--
@component x-plume::data-table
@description Advanced table with sorting, filtering, and pagination. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.
@prop array data - Static data for client-side mode.
@prop array columns - Column definitions (key, label, sortable, headerClass, cellClass).
@prop bool searchable - Enable search input.
@prop bool paginated - Enable pagination.
@prop int perPage - Items per page.
@prop bool sortable - Enable sorting globally.
@prop string url - API endpoint for server-side fetching.
--}}
<div x-data="dataTable({{ $perPage }}, {{ Js::from($paginated) }}, {{ Js::from($sortable) }}, {{ Js::from($url) }})" {{ $attributes->merge(['class' => 'space-y-4']) }}
    :data="{{ Js::from($data) }}" :columns="{{ Js::from($columns) }}">
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
            <template x-for="(row, index) in pagedData" :key="index">
                <x-plume::table.tr>
                    <template x-for="col in columns" :key="col.key">
                        <x-plume::table.td ::class="col.cellClass">
                            <span x-text="row[col.key]"></span>
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
                Showing <span
                    x-text="filteredData.length > 0 ? ((page - 1) * perPage) + 1 : 0"></span> to
                <span x-text="Math.min(page * perPage, filteredData.length)"></span> of
                <span x-text="filteredData.length"></span> results
            </div>
            <x-plume::pagination ::total="totalPages" ::current="page"
                @change="page = $event.detail.page" />
        </div>
    @endif
</div>