{{--
@component x-plume::table.thead
@description Table header container.
@prop bool $sticky (Default: false)
--}}
<thead
    {{ $attributes->merge(['class' => ($sticky ? 'sticky top-0 z-10 bg-background dark:bg-background-800 [&_th]:shadow-[inset_0_-1px_0_0_rgba(0,0,0,0.1)] dark:[&_th]:shadow-[inset_0_-1px_0_0_rgba(255,255,255,0.1)]' : 'border-b border-background-700/40 dark:border-background-400/20')]) }}>
    {{ $slot }}
</thead>