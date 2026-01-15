{{--
@component x-plume::table.head
--}}
@props([
    'sortable' => false,
    'direction' => null, // 'asc', 'desc', or null
])

@php
    $hasSortAttribute = $attributes->has('sortable') || $attributes->has('::sortable') || $attributes->has('x-bind:sortable');
    $isSortable = $sortable || $hasSortAttribute;
    $directionValue = $attributes->get('::direction') ?? (isset($direction) ? "'$direction'" : 'null');
@endphp

<th {{ $attributes->merge(['class' => 'h-12 px-4 text-left align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0' . ($isSortable ? ' cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50' : '')]) }}>
    <div class="flex items-center gap-2">
        <span>{{ $slot }}</span>

        @if($isSortable)
            <div 
                class="flex flex-col text-foreground/40 shrink-0"
                @if($hasSortAttribute)
                    x-show="{{ $attributes->get('::sortable') ?? $attributes->get('x-bind:sortable') ?? 'true' }}"
                @endif
            >
                <x-plume::icon 
                    i="icon-[fluent--chevron-up-24-regular]" 
                    class="size-3 -mb-1 transition-colors"
                    ::class="({{ $directionValue }}) === 'asc' ? 'text-primary opacity-100' : ''"
                />
                <x-plume::icon 
                    i="icon-[fluent--chevron-down-24-regular]" 
                    class="size-3 -mt-1 transition-colors"
                    ::class="({{ $directionValue }}) === 'desc' ? 'text-primary opacity-100' : ''"
                />
            </div>
        @endif
    </div>
</th>
