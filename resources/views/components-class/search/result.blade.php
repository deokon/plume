{{--
@component x-plume::search-result
@description An individual result item within a search component.
--}}
<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-background-100 dark:hover:bg-background-800 transition-colors group']) }}>
    @if ($icon)
        <div
            class="size-8 rounded bg-primary/10 text-primary flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:text-primary-foreground transition-colors">
            <x-plume::icon i="{{ $icon }}" class="size-5" />
        </div>
    @endif

    <div class="flex-1 min-w-0">
        <p class="text-sm font-bold text-foreground dark:text-background-200 truncate">{{ $title }}</p>
        @if ($slot->isNotEmpty())
            <p class="text-xs text-foreground/50 dark:text-background-400 truncate">{{ $slot }}</p>
        @endif
    </div>

    <x-plume::icon i="icon-[fluent--arrow-right-24-regular]"
        class="size-4 text-foreground/20 dark:text-background-600 opacity-0 group-hover:opacity-100 transition-all -translate-x-2 group-hover:translate-x-0" />
</a>