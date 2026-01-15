{{--
@component x-plume::empty-state
@description Use this component to show a placeholder when a list or page has no data.
@usage
<x-plume::empty-state 
    title="No items found" 
    description="Get started by creating your first item."
/>
--}}
@props([
    'title' => 'No results found',
    'description' => null,
    'icon' => 'icon-[fluent--search-info-24-regular]',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center p-8 text-center']) }}>
    <div class="mb-4 rounded-full bg-background-200 dark:bg-background-700 p-4">
        <x-plume::icon :i="$icon" class="size-8 text-foreground/40" />
    </div>
    <h3 class="text-lg font-bold">{{ $title }}</h3>
    @if($description)
        <p class="mt-1 text-sm text-foreground/50">{{ $description }}</p>
    @endif
    @if($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
