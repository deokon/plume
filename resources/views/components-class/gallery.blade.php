{{--
@component x-plume::gallery
@description Responsive grid layout for images and figures.
@prop int $cols (Default: 3) Shortcut to set responsive column distribution.
@prop int $gap (Default: 4) Gap between grid items.
@prop int $minCols (Default: 1) Minimum number of grid columns on mobile.
@prop int $maxCols (Default: null) Maximum number of grid columns on large screens.
--}}
<div {{ $attributes->merge(['class' => 'w-full ' . $gridClasses]) }}>
    {{ $slot }}
</div>
