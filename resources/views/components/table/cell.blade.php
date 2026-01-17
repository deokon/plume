{{--
@component x-plume::table.cell
--}}
@props(['align' => 'left'])
<td
    {{ $attributes->merge(['class' => "p-4 align-middle text-$align [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>
