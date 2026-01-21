{{--
@component x-plume::table.tbody
@description Table body container.
--}}
@aware([
    'striped' => false,
])
@php
    $resolvedStriped = $attributes->get('striped', $striped);
@endphp
<tbody
    {{ $attributes->except('striped')->merge(['class' => '[&_tr:last-child]:border-0 [&_tr]:transition-colors' . ($resolvedStriped ? ' [&_tr:nth-child(odd)]:bg-secondary-100/70 dark:[&_tr:nth-child(odd)]:bg-secondary-700/30' : '') . ' [&_tr:hover]:bg-primary/20!']) }}>
    {{ $slot }}
</tbody>