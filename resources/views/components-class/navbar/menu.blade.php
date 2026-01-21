{{--
@component x-plume::navbar.menu
@description Container for navigation items.
--}}
<div {{ $attributes->merge(['class' => 'hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8']) }}>
    {{ $slot }}
</div>
