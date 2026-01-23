{{--
@component x-plume::table.td
@description Table data cell.
@prop string $align (Default: 'left')
--}}
@aware(['rowAlign' => null])
@php
    $alignments = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];
    $resolvedAlign = $align ?? $rowAlign ?? 'left';
    $alignClass = $alignments[$resolvedAlign] ?? 'text-left';
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<td {{ $cleanAttributes->merge(['class' => "p-4 $alignClass align-middle [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</td>
