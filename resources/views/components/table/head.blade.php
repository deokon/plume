{{--
@component x-plume::table.head
--}}
@props(['align' => 'left'])
<th
    {{ $attributes->merge(['class' => "h-12 px-4 text-$align align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</th>
