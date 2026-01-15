{{--
@component x-plume::icon
@description Renders an Iconify icon.
--}}
@props([
    'i',
])

<span {{ $attributes->merge(['class' => 'icon '.$i]) }}></span>
