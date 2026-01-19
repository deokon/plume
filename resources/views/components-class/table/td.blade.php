{{--
@component x-plume::table.td
--}}
@aware(['align' => null])
@php
    $resolvedAlign = $component->resolveAttribute($attributes, 'align', $align, 'left');
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<td
    {{ $cleanAttributes->merge(['class' => "p-4 text-$resolvedAlign align-middle [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>
