{{--
@component x-plume::table.th
@description Table header cell.
@prop string $align (Default: null)
--}}
@aware(['rowAlign' => null])
@php
    $alignments = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ];
    $resolvedAlign = $align ?? ($rowAlign ?? 'left');
    $alignClass = $alignments[$resolvedAlign] ?? 'text-left';
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<th
    {{ $cleanAttributes->merge(['class' => "h-12 px-4 $alignClass align-middle uppercase font-medium [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</th>
