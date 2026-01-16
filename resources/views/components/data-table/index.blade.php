{{--
@component x-plume::data-table
@description Advanced table with sorting, filtering, and pagination. Powered by AlpineJS.
@usage
<x-plume::data-table 
    :data="$users" 
    :columns="[
        ['key' => 'id', 'label' => 'ID', 'sortable' => true],
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
    ]" 
    searchable 
    paginated 
/>
--}}
@props([
    'data' => [],
    'columns' => [],
    'searchable' => false,
    'paginated' => false,
    'perPage' => 10,
    'sortable' => true,
])

<div 
    x-data="dataTable({{ $perPage }}, {{ Js::from($paginated) }}, {{ Js::from($sortable) }})"
    {{ $attributes->merge(['class' => 'space-y-4']) }}
    :data="{{ Js::from($data) }}"
    :columns="{{ Js::from($columns) }}"
>
    @if($searchable)
        <div class="flex items-center justify-between px-4 pt-4">
            <x-plume::form.input 
                x-model.debounce.300ms="search" 
                placeholder="Search..." 
                class="max-w-xs"
                icon="icon-[fluent--search-24-regular]"
            />
        </div>
    @endif

    <x-plume::table>
        <x-plume::table.header>
            <x-plume::table.row>
                <template x-for="col in columns" :key="col.key">
                    <x-plume::table.head 
                        ::class="(col.sortable !== false && sortable ? 'cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50 ' : '') + (col.headerClass || '')"
                        @click="col.sortable !== false && sortable && toggleSort(col.key)"
                    >
                        <div class="flex items-center gap-2">
                            <span x-text="col.label"></span>
                            
                            <template x-if="col.sortable !== false && sortable">
                                <div class="flex flex-col text-foreground/40 dark:text-background-400/50 shrink-0 gap-y-1.5">
                                    <span 
                                        class="icon icon-[fluent--caret-up-24-filled] size-3.5 -mb-1.5 transition-colors"
                                        :class="sortCol === col.key && sortDir === 'asc' ? 'text-primary opacity-100' : ''"
                                    ></span>
                                    <span 
                                        class="icon icon-[fluent--caret-down-24-filled] size-3.5 -mt-1.5 transition-colors"
                                        :class="sortCol === col.key && sortDir === 'desc' ? 'text-primary opacity-100' : ''"
                                    ></span>
                                </div>
                            </template>
                        </div>
                    </x-plume::table.head>
                </template>
            </x-plume::table.row>
        </x-plume::table.header>
        <x-plume::table.body>
            <template x-for="(row, index) in pagedData" :key="index">
                <x-plume::table.row>
                    <template x-for="col in columns" :key="col.key">
                        <x-plume::table.cell ::class="col.cellClass">
                            <span x-text="row[col.key]"></span>
                        </x-plume::table.cell>
                    </template>
                </x-plume::table.row>
            </template>
            <template x-if="filteredData.length === 0">
                <x-plume::table.row>
                    <x-plume::table.cell ::colspan="columns.length" class="text-center py-12">
                        <x-plume::empty-state 
                            title="No results found" 
                            description="Try adjusting your search or filters."
                        />
                    </x-plume::table.cell>
                </x-plume::table.row>
            </template>
        </x-plume::table.body>
    </x-plume::table>

    @if($paginated)
        <div class="flex flex-col items-center gap-4 px-4 pb-4 sm:flex-row sm:justify-between">
            <div class="text-xs text-foreground/50 dark:text-background-400">
                Showing <span x-text="filteredData.length > 0 ? ((page - 1) * perPage) + 1 : 0"></span> to 
                <span x-text="Math.min(page * perPage, filteredData.length)"></span> of 
                <span x-text="filteredData.length"></span> results
            </div>
            <x-plume::pagination 
                ::total="totalPages" 
                ::current="page" 
                @change="page = $event.detail.page"
            />
        </div>
    @endif
</div>