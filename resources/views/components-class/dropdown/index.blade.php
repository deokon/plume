{{--
@component x-plume::dropdown
@description Displays a menu to the user—such as a set of actions or functions—triggered by a button.
@prop string $trigger (Default: null) The text or slot content for the dropdown trigger button.
@prop string $align (Default: 'right') Alignment of the dropdown menu: 'left', 'right', 'top'.
@prop string $width (Default: 'md') Width of the menu: 'xs', 'sm', 'md', 'lg', 'xl', or custom CSS width class.
@prop string $contentClasses (Default: 'bg-background dark:bg-background-800') Additional classes for the menu container.
@prop string $triggerStyle (Default: 'outline') Visual style of the automatic trigger button: 'primary', 'secondary', 'error', 'outline', 'ghost', 'link', 'minor'.
@usage
<x-plume::dropdown trigger="Actions" align="right" width="sm">
    <x-plume::dropdown.item href="/edit">Edit</x-plume::dropdown.item>
    <x-plume::dropdown.item href="/delete" class="text-error">Delete</x-plume::dropdown.item>
</x-plume::dropdown>
--}}
@php $dropdown = $component; @endphp
<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        @if (isset($trigger) && $trigger instanceof \Illuminate\View\ComponentSlot)
            {{ $trigger }}
        @elseif (isset($trigger))
            <x-plume::button type="button" style="{{ $triggerStyle }}" class="justify-between"
                ::class="{ 'bg-background-100 dark:bg-background-700': open }">
                {{ $trigger }}
                <x-plume::icon i="icon-[fluent--chevron-down-12-filled]"
                    class="size-4 ml-2 transition-transform duration-200" ::class="{ 'rotate-180': open }" />
            </x-plume::button>
        @endif
    </div>

    <div x-show="open" x-cloak x-transition:enter="{{ $enter }}"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="{{ $leave }}"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $widthClass }} rounded-md shadow-lg border border-background-600 dark:border-background-200 {{ $alignmentClasses }}"
        style="display: none;" @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>
