{{--
@component x-plume::carousel.item
@description An individual slide within a carousel.
--}}
<div
    {{ $attributes->merge(['class' => 'w-full shrink-0 snap-center flex items-center justify-center h-full']) }}>
    {{ $slot }}
</div>
