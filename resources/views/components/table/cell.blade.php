{{--
@component x-plume::table.cell
--}}
@props(['align' => 'left'])

@php
    $alignClass = match ($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<td
    {{ $attributes->merge(['class' => "p-4 align-middle $alignClass [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>
