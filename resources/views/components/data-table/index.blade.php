{{--
@component x-plume::data-table
@description Advanced table with sorting, filtering, and pagination.
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
    x-data="{
        data: {{ Js::from($data) }},
        columns: {{ Js::from($columns) }},
        search: '',
        sortCol: '',
        sortDir: 'asc',
        page: 1,
        perPage: {{ $perPage }},

        get filteredData() {
            let filtered = this.data;
            
            if (this.search) {
                const query = this.search.toLowerCase();
                filtered = filtered.filter(row => {
                    return Object.values(row).some(val => 
                        String(val).toLowerCase().includes(query)
                    );
                });
            }

            if (this.sortCol) {
                filtered.sort((a, b) => {
                    let valA = a[this.sortCol];
                    let valB = b[this.sortCol];
                    
                    if (valA < valB) return this.sortDir === 'asc' ? -1 : 1;
                    if (valA > valB) return this.sortDir === 'asc' ? 1 : -1;
                    return 0;
                });
            }

            return filtered;
        },

        get pagedData() {
            if (!{{ Js::from($paginated) }}) return this.filteredData;
            const start = (this.page - 1) * this.perPage;
            return this.filteredData.slice(start, start + this.perPage);
        },

        get totalPages() {
            return Math.ceil(this.filteredData.length / this.perPage);
        },

        toggleSort(key) {
            if (this.sortCol === key) {
                this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
            } else {
                this.sortCol = key;
                this.sortDir = 'asc';
            }
        }
    }"
    class="space-y-4"
>
    @if($searchable)
        <div class="flex items-center justify-between">
            <x-plume::form.input 
                x-model.debounce.300ms="search" 
                placeholder="Search..." 
                class="max-w-xs"
            >
                <x-slot:prefix>
                    <x-plume::icon i="icon-[fluent--search-24-regular]" class="size-4 text-foreground/40" />
                </x-slot:prefix>
            </x-plume::form.input>
        </div>
    @endif

    <x-plume::table {{ $attributes }}>
        <x-plume::table.header>
            <x-plume::table.row>
                <template x-for="col in columns" :key="col.key">
                    <x-plume::table.head 
                        ::sortable="col.sortable !== false && {{ Js::from($sortable) }}"
                        ::direction="sortCol === col.key ? sortDir : null"
                        @click="col.sortable !== false && {{ Js::from($sortable) }} && toggleSort(col.key)"
                        ::class="col.headerClass"
                    >
                        <span x-text="col.label"></span>
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
                    <x-plume::table.cell ::colspan="columns.length" class="text-center py-8">
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
        <div class="flex items-center justify-between px-2">
            <div class="text-xs text-foreground/50">
                Showing <span x-text="((page - 1) * perPage) + 1"></span> to 
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
