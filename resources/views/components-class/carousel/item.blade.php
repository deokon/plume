{{--
@component x-plume::carousel.item
@description An individual slide within a carousel slideshow.
@usage
<x-plume::carousel>
    <x-plume::carousel.item>
        <img src="/slide1.jpg" alt="Slide 1">
    </x-plume::carousel.item>
</x-plume::carousel>
--}}
<div
    {{ $attributes->merge(['class' => 'w-full shrink-0 snap-center flex items-center justify-center h-full']) }}>
    {{ $slot }}
</div>
