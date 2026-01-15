{{--
@component x-plume::empty-state
@prop {string} title - Default: No results found
@prop {string} description - Default: Nothing found here.
--}}
@props([
    'title' => 'No results found',
    'description' => 'Nothing found here.',
])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-12 px-4 text-center']) }}>
    @if($slot->isNotEmpty())
        <div class="mb-6 opacity-10 dark:opacity-20 text-foreground">
            {{ $slot }}
        </div>
    @endif
    
    <h3 class="text-lg font-bold">{{ $title }}</h3>
    <p class="mt-2 text-sm text-foreground/50 dark:text-background-400 max-w-xs">{{ $description }}</p>
</div>