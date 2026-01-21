{{--
@component x-plume::table.td
@description Table data cell.
--}}
@aware(['align' => null])
@php
    $alignments = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];
    $alignClass = $alignments[$align] ?? 'text-left';
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<td {{ $cleanAttributes->merge(['class' => "p-4 $alignClass align-middle [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>
