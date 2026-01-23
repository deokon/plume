{{--
@component x-plume::navbar.item
@description Individual navigation link.
@prop bool $active (Default: false)
@prop string $href (Default: '#')
--}}
@php
    $classes = $active
        ? 'inline-flex items-center border-b-2 border-primary px-1 pt-1 text-sm font-medium text-foreground'
        : 'inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-foreground/60 hover:border-background-300 hover:text-foreground/80 dark:hover:border-background-600';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>