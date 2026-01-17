{{--
@component x-plume::form.section
--}}
@props([
    'title' => null,
    'description' => null,
    'minCols' => 1,
    'maxCols' => null,
])
@php
    $cols =
        match (intval($minCols)) {
            1 => 'grid-cols-1',
            2 => 'grid-cols-2',
            3 => 'grid-cols-3',
            4 => 'grid-cols-4',
            default => 'grid-cols-1',
        } .
        match (intval($maxCols)) {
            0 => '',
            1 => ' md:grid-cols-1',
            2 => ' md:grid-cols-2',
            3 => ' md:grid-cols-3',
            4 => ' md:grid-cols-4',
            default => '',
        };
@endphp

<fieldset
    {{ $attributes->merge(['class' => 'grid gap-x-6 gap-y-4 pb-4 border-b items-start border-background-700/40 dark:border-background-400/20 ' . $cols]) }}>
    @if ($title || $description)
        <div class="space-y-1 mb-2 col-span-full">
            @if ($title)
                <h3 class="text-lg font-medium text-foreground dark:text-background-200">
                    {{ $title }}</h3>
            @endif
            @if ($description)
                <p class="text-sm text-foreground/50 dark:text-background-400">{{ $description }}
                </p>
            @endif
        </div>
    @endif
    {{ $slot }}
</fieldset>
