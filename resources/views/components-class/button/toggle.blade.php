{{--
@component x-plume::button.toggle
@description Button that toggles between two states.
@prop string $var (Default: null) AlpineJS variable name that controls the toggle state.
@prop string $size (Default: 'md') Size of the buttons (xs, sm, md, lg, xl).
@prop string $style (Default: null) Style of the 'on' button (primary, outline, etc.).
@prop string $offStyle (Default: null) Style of the 'off' button.
@prop string $on (Default: null) Text or HTML for the 'on' state.
@prop string $off (Default: null) Text or HTML for the 'off' state.
@prop string $click (Default: null) Custom JavaScript to execute on click instead of default toggle logic.
--}}
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $style }}"
    x-cloak x-show="{{ $var }}" x-bind:inert="!{{ $var }}"
    x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $on ?? $slot }}
</x-plume::button>
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $offStyle }}"
    x-cloak x-show="!{{ $var }}" x-bind:inert="{{ $var }}"
    x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $off ?? $slot }}
</x-plume::button>
