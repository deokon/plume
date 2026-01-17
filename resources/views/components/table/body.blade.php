{{--
@component x-plume::table.body
--}}
@aware([
    'striped' => false,
])
<tbody
    {{ $attributes->merge(['class' => '[&_tr:last-child]:border-0 [&_tr]:transition-colors' . ($striped ? ' [&_tr:nth-child(odd)]:bg-secondary-100/70 dark:[&_tr:nth-child(odd)]:bg-secondary-700/30' : '') . ' [&_tr:hover]:bg-primary/20!']) }}>
    {{ $slot }}
</tbody>
