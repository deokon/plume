{{--
@component x-plume::navbar.logo
@description The brand logo or title.
@prop string $href (Default: '/') The URL the logo links to.
--}}
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex shrink-0 items-center']) }}>
    {{ $slot }}
</a>
