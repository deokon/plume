{{--
@component x-plume::table.td
--}}
<td
    {{ $attributes->merge(['class' => "p-4 align-middle $alignClass [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>