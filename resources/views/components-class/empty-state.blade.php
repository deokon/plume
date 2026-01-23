{{--
@component x-plume::empty-state
@description Use this component to show a placeholder when a list or page has no data.
@prop string $title (Default: 'No results found')
@prop string $description (Default: null)
@prop string $icon (Default: 'icon-[fluent--search-info-24-regular]')
--}}
<div
    {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center p-8 text-center w-full']) }}>
    <div class="mb-4 rounded-full bg-background-200 dark:bg-background-700 p-4">
        <x-plume::icon :i="$icon"
            class="size-8 text-foreground/40 dark:text-background-400/60" />
    </div>
    <h3 class="text-lg font-bold dark:text-background-200">{{ $title }}</h3>
    @if ($description)
        <p class="mt-1 text-sm text-foreground/50 dark:text-background-400">{{ $description }}</p>
    @endif
    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
