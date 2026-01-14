@props([
    'title' => 'No results found',
    'description' => 'Light as a feather... but nothing found here.',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 px-4 text-center']) }}>
    <div class="mb-6 opacity-10 dark:opacity-20">
        <x-plume::logo size="size-24" />
    </div>
    <h3 class="text-lg font-bold">{{ $title }}</h3>
    <p class="mt-2 text-sm text-foreground/50 dark:text-background-400 max-w-xs">{{ $description }}</p>
    @if($slot->isNotEmpty())
        <div class="mt-8">
            {{ $slot }}
        </div>
    @endif
</div>
