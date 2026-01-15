{{--
@component x-plume::icon
@prop {mixed} i - Default: required
--}}
@props([
    'i',
])

<span {{ $attributes->merge(['class' => 'icon '.$i]) }}></span>
