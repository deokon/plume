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
