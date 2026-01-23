{{--
@component x-plume::navbar.logo
@description The brand logo or title.
--}}
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex shrink-0 items-center']) }}>
    {{ $slot }}
</a>
