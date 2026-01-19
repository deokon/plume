{{--
@component x-plume::table.thead
--}}
<thead
    {{ $attributes->merge(['class' => ($sticky ? 'sticky top-0 z-10 bg-background dark:bg-background-800' : 'border-b border-background-700/40 dark:border-background-400/20')]) }}>
    {{ $slot }}
</thead>