{{--
@component x-plume::gallery
@description Responsive grid layout for images and figures.
--}}
<div {{ $attributes->merge(['class' => 'grid ' . $gridClasses]) }}>
    {{ $slot }}
</div>