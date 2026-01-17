@use('deokon\Plume\Theme')
{{--
@component x-plume::dropdown
@description Displays a menu to the user—such as a set of actions or functions—triggered by a button.
--}}
@props([
    'align' => 'right',
    'width' => 'md',
    'contentClasses' => 'bg-background dark:bg-background-800',
])

@php
    $theme = Theme::dropdown($align, $width);
    $alignmentClasses = $theme['align'];
    $widthClass = $theme['width'];
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $widthClass }} rounded-md shadow-lg border border-background-600 dark:border-background-200 {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $slot }}
        </div>
    </div>
</div>
