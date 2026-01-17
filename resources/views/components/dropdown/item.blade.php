{{--
@component x-plume::dropdown.item
--}}
@props([
    'style' => 'ghost',
])

<x-plume::button
    {{ $attributes->merge([
        'style' => $style,
        'class' =>
            'w-full justify-start rounded-none first:rounded-t-md last:rounded-b-md px-4 py-2 text-sm',
    ]) }}
    full-width>
    {{ $slot }}
</x-plume::button>
