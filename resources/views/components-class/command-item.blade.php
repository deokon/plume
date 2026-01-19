{{--
@component x-plume::command.item
--}}
<div x-data="{
    get isVisible() {
        if (this.search === '') return true;
        return this.$el.textContent.toLowerCase().includes(this.search.toLowerCase());
    }
}" x-show="isVisible" role="option"
    {{ $attributes->merge(['class' => 'flex items-center gap-3 px-2 py-2 rounded-lg cursor-pointer transition-colors text-sm font-medium']) }}
    :class="filteredItems[activeIndex] === $el ? 'bg-primary text-primary-foreground' :
        'hover:bg-background-100 dark:hover:bg-background-800 text-foreground/80'">
    @if ($icon)
        <x-plume::icon i="{{ $icon }}" class="size-4 shrink-0" />
    @endif

    <span class="flex-1 truncate">{{ $slot }}</span>

    @if ($shortcut)
        <x-plume::kbd size="sm">{{ $shortcut }}</x-plume::kbd>
    @endif
</div>