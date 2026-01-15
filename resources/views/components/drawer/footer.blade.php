{{--
@component x-plume::drawer.footer
--}}
<div {{ $attributes->merge(['class' => 'flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 p-6']) }}>
    {{ $slot }}
</div>
