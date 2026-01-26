{{--
@component x-plume::icon
@description Displays an icon from the Iconify library.
@prop string $i (Default: null)
--}}
<span {{ $attributes->merge(['class' => 'icon ' . $i]) }}></span>
