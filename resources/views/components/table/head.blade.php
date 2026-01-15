{{--
@component x-plume::table.head
--}}
@props([
    'sortable' => false,
    'direction' => null, // 'asc', 'desc', or null
])

<th {{ $attributes->merge(['class' => 'h-12 px-4 text-left align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0' . ($sortable ? ' cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50' : '')]) }}>
    <div 
        class="flex items-center gap-2"
        @if($sortable)
            x-data="{ 
                get dir() { return this.$el.closest('th').getAttribute('direction') } 
            }"
        @endif
    >
        {{ $slot }}

        @if($sortable)
            <div class="flex flex-col text-foreground/20 shrink-0">
                <x-plume::icon 
                    i="icon-[fluent--chevron-up-24-regular]" 
                    class="size-3 -mb-1"
                    ::class="dir === 'asc' ? 'text-primary' : ''"
                />
                <x-plume::icon 
                    i="icon-[fluent--chevron-down-24-regular]" 
                    class="size-3 -mt-1"
                    ::class="dir === 'desc' ? 'text-primary' : ''"
                />
            </div>
        @endif
    </div>
</th>
