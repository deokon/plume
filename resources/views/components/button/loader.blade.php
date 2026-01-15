{{--
@component x-plume::button.loader
@description Button with built-in loading state management.
@prop {mixed} var - Required. AlpineJS boolean variable to control loading state. (Default: required)
@prop {string} size -  (Default: md)
@prop {null} style -  (Default: null)
--}}
@props([
    'var',
    'size' => 'md',
    'style' => null,
])
<x-plume::button {{ $attributes->merge(['class' => 'relative']) }} x-bind:class="{'[&>:not(:last-child)]:invisible': {{ $var }}}">
    <span>{{ $slot }}</span>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" x-show="{{ $var }}">
        <x-plume::spinner 
            :size="match($size) { 'sm' => 'sm', 'lg' => 'md', default => 'sm' }" 
            style="white" 
        />
    </div>
</x-plume::button>
