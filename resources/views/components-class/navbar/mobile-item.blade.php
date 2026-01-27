{{--
@component x-plume::navbar.mobile-item
@description Individual navigation link for mobile menu.
@prop bool $active (Default: false) Whether this mobile menu item is currently active.
@prop string $href (Default: '#') The URL the item links to.
--}}
@php
    $classes = $active
        ? 'block border-l-4 border-primary bg-primary/10 py-2 pl-3 pr-4 text-base font-medium text-primary'
        : 'block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-foreground/60 hover:border-background-300 hover:bg-background-50 hover:text-foreground/80 dark:hover:bg-background-800 dark:hover:border-background-600';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
