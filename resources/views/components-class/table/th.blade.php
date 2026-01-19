{{--
@component x-plume::table.th
--}}
<th
    {{ $attributes->merge(['class' => "h-12 px-4 $alignClass align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</th>