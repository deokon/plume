{{--
@component x-plume::icon
@description Renders an Iconify icon.
@prop {mixed} i - Required. Icon class name (e.g. icon-[set--name]). (Default: required)
--}}
@props([
    'i',
])

<span {{ $attributes->merge(['class' => 'icon '.$i]) }}></span>
