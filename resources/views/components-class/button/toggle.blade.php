{{--
@component x-plume::button.toggle
@description Button that toggles between two states.
@prop string $var (Default: null)
@prop string $size (Default: 'md')
@prop string $style (Default: null)
@prop string $offStyle (Default: null)
@prop string $on (Default: null)
@prop string $off (Default: null)
@prop string $click (Default: null)
--}}
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $style }}"
    x-show="{{ $var }}" x-bind:inert="!{{ $var }}"
    x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $on ?? $slot }}
</x-plume::button>
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $offStyle }}"
    x-show="!{{ $var }}" x-bind:inert="{{ $var }}"
    x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $off ?? $slot }}
</x-plume::button>