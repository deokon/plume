{{--
@component x-plume::table.th
--}}
@aware(['align' => null])
@php
    $resolvedAlign = $component->resolveAttribute($attributes, 'align', $align, 'left');
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<th
    {{ $cleanAttributes->merge(['class' => "h-12 px-4 text-$resolvedAlign align-middle uppercase font-medium border-b border-background-700/40 dark:border-background-400/20 [&:has([role=checkbox])]:pr-0"]) }}>
    {{ $slot }}
</th>
