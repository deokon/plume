{{--
@component x-plume::tooltip
@description A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.
@prop string $text (Default: null) The text to display in the tooltip.
@prop string $position (Default: 'top') Tooltip position (top, bottom, left, right).
--}}
<div {{ $attributes->merge(['class' => 'relative group inline-block']) }}>
    {{ $slot }}

    <div
        class="absolute z-50 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity duration-200 {{ $positionClasses }}">
        <div
            class="relative bg-background-800 text-background-200 dark:bg-background-200 dark:text-background-800 text-xs rounded py-1 px-2 whitespace-nowrap shadow-md">
            {{ $text }}
            <div class="absolute border-4 {{ $arrowClasses }}"></div>
        </div>
    </div>
</div>
