{{--
@component x-plume::tooltip
@description A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.
@prop string $text (Default: null) The text to display in the tooltip.
@prop string $position (Default: 'top') Tooltip position (top, bottom, left, right).
@prop string $onShow (Default: null) AlpineJS expression or function to call when the tooltip is shown.
@prop string $onHide (Default: null) AlpineJS expression or function to call when the tooltip is hidden.
--}}
<div x-data="{
    show: false,
    _config: {
        onShow: {{ Js::from($onShow) }},
        onHide: {{ Js::from($onHide) }}
    },
    triggerCallback(name) {
        const callback = this._config[name];
        if (!callback) return;
        if (typeof callback === 'function') {
            callback();
        } else if (typeof callback === 'string') {
            Alpine.evaluate(this.$el, callback);
        }
    }
}" x-init="$watch('show', value => value ? triggerCallback('onShow') : triggerCallback('onHide'))"
    {{ $attributes->merge(['class' => 'relative group inline-block']) }} @mouseenter="show = true"
    @mouseleave="show = false" @focusin="show = true" @focusout="show = false">
    {{ $slot }}

    <div x-show="show" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 {{ $positionClasses }}">
        <div
            class="relative bg-background-800 text-background-200 dark:bg-background-200 dark:text-background-800 text-xs rounded py-1 px-2 whitespace-nowrap shadow-md">
            {{ $text }}
            <div class="absolute border-4 {{ $arrowClasses }}"></div>
        </div>
    </div>
</div>
