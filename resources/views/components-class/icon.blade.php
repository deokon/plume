{{--
@component x-plume::icon
@description Displays an icon using the Iconify library (specifically the Fluent set by default).
@prop string $i (Default: null) The full icon name (e.g., 'icon-[fluent--save-24-regular]').
@usage
<x-plume::icon i="icon-[fluent--home-24-filled]" class="size-6 text-primary" />
--}}
<span {{ $attributes->merge(['class' => 'icon ' . $i]) }}></span>
