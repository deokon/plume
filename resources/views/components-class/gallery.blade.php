{{--
@component x-plume::gallery
@description Responsive grid layout for images and figures.
@prop int $cols (Default: 3)
@prop int $gap (Default: 4)
--}}
<div {{ $attributes->merge(['class' => 'w-full grid ' . $gridClasses]) }}>
    {{ $slot }}
</div>
