{{--
@component x-plume::table.header
--}}
@props(['sticky' => false])
<thead {{ $attributes->merge(['class' => '[&_tr]:border-b-2 ' . ($sticky ? 'sticky top-0 bg-background dark:bg-background-800 z-10' : '')]) }}>
    {{ $slot }}
</thead>