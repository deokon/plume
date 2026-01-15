{{--
@component x-plume::data-table
@description Advanced table with sorting, filtering, and pagination. Powered by AlpineJS.
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

        init() {
            this.$watch('search', () => this.page = 1);
        },

        get filteredData() {
            let filtered = [...this.data];
            
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
            return Math.ceil(this.filteredData.length / this.perPage) || 1;
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
        <div class="flex items-center justify-between px-4 pt-4">
            <x-plume::form.input 
                x-model.debounce.300ms="search" 
                placeholder="Search..." 
                class="max-w-xs"
                icon="icon-[fluent--search-24-regular]"
            />
        </div>
    @endif

    <x-plume::table {{ $attributes }}>
        <x-plume::table.header>
            <x-plume::table.row>
                <template x-for="col in columns" :key="col.key">
                    <x-plume::table.head 
                        ::class="(col.sortable !== false && {{ Js::from($sortable) }} ? 'cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50 ' : '') + (col.headerClass || '')"
                        @click="col.sortable !== false && {{ Js::from($sortable) }} && toggleSort(col.key)"
                    >
                        <div class="flex items-center gap-2">
                            <span x-text="col.label"></span>
                            
                            <template x-if="col.sortable !== false && {{ Js::from($sortable) }}">
                                <div class="flex flex-col text-foreground/40 shrink-0">
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
            <div class="text-xs text-foreground/50">
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