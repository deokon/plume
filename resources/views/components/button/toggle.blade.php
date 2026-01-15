{{--
@component x-plume::button.toggle
@description Button that toggles between two states.
@prop {mixed} var - Required. AlpineJS boolean variable. (Default: required)
@prop {string} size -  (Default: md)
@prop {null} style -  (Default: null)
@prop {null} offStyle - Button style when false. (Default: null)
@prop {null} on - Label when true. (Default: null)
@prop {null} off - Label when false. (Default: null)
@prop {null} click -  (Default: null)
--}}
@props([
    'var',
    'size' => 'md',
    'style' => null,
    'offStyle' => null,
    'on' => null,
    'off' => null,
    'click' => null,
])
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $style }}" x-show="{{ $var }}" x-bind:inert="!{{ $var }}" x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $on ?? $slot }}
</x-plume::button>
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} style="{{ $offStyle }}" x-show="!{{ $var }}" x-bind:inert="{{ $var }}" x-on:click="{{ $click ?? $var . ' = !' . $var }}">
    {{ $off ?? $slot }}
</x-plume::button>
