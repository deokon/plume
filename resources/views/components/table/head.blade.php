{{--
@component x-plume::table.head
--}}
@props([
    'sortable' => false,
    'direction' => null,
])

@php
    // Check for any sorting-related attributes to ensure server-side rendering of markup
    $isSortable = $sortable 
        || $attributes->has('sortable') 
        || $attributes->has('::sortable') 
        || $attributes->has('x-bind:sortable')
        || $attributes->has('::direction');

    $directionValue = $attributes->get('::direction') ?? (isset($direction) ? "'$direction'" : 'null');
    $sortableValue = $attributes->get('::sortable') ?? $attributes->get('x-bind:sortable') ?? ($isSortable ? 'true' : 'false');
@endphp

<th {{ $attributes->merge(['class' => 'h-12 px-4 text-left align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0' . ($isSortable ? ' cursor-pointer select-none hover:bg-background-200/50 dark:hover:bg-background-700/50' : '')]) }}>
    <div class="flex items-center gap-2">
        <span>{{ $slot }}</span>

        @if($isSortable)
            <div 
                class="flex flex-col text-foreground/30 shrink-0"
                x-show="{{ $sortableValue }}"
            >
                <span 
                    class="icon icon-[fluent--chevron-up-24-regular] size-3 -mb-1 transition-colors"
                    :class="({{ $directionValue }}) === 'asc' ? 'text-primary opacity-100' : ''"
                ></span>
                <span 
                    class="icon icon-[fluent--chevron-down-24-regular] size-3 -mt-1 transition-colors"
                    :class="({{ $directionValue }}) === 'desc' ? 'text-primary opacity-100' : ''"
                ></span>
            </div>
        @endif
    </div>
</th>