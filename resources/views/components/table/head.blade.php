{{--
@component x-plume::table.head
--}}
@props(['align' => 'left'])

@php
    $alignClass = match ($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<th
    {{ $attributes->merge(['class' => "h-12 px-4 $alignClass align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</th>
