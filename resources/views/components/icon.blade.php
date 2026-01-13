@props([
    'i',
])

<span {{ $attributes->merge(['class' => 'icon '.$i]) }}></span>
