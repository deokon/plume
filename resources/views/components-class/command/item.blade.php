{{--
@component x-plume::command.item
@description An individual command or selection within a command palette group.
@prop string $value (Default: null) The underlying value associated with the item.
@prop string $onSelect (Default: null) AlpineJS expression or function to call when the item is activated.
@prop string $icon (Default: null) Iconify icon name.
@prop string $shortcut (Default: null) Keyboard shortcut text to display (e.g., '⌘K').
@usage
<x-plume::command.item 
    icon="icon-[fluent--save-24-regular]" 
    shortcut="⌘S"
    @click="$success('Saved!')"
>
    Save Document
</x-plume::command.item>
--}}
<div x-data="{
    get isVisible() {
        if (this.search === '') return true;
        return this.$el.textContent.toLowerCase().includes(this.search.toLowerCase());
    }
}" x-show="isVisible" role="option"
    :aria-selected="filteredItems[activeIndex] === $el"
    {{ $attributes->merge(['class' => 'flex items-center gap-3 px-2 py-2 rounded-lg cursor-pointer transition-colors text-sm font-medium']) }}
    :class="filteredItems[activeIndex] === $el ? 'bg-primary text-primary-foreground' :
        'hover:bg-background-100 dark:hover:bg-background-800 text-foreground/80 dark:text-background-200'">
    @if ($icon)
        <x-plume::icon i="{{ $icon }}" class="size-4 shrink-0" />
    @endif

    <span class="flex-1 truncate">{{ $slot }}</span>

    @if ($shortcut)
        <x-plume::kbd size="sm">{{ $shortcut }}</x-plume::kbd>
    @endif
</div>
