{{--
@component x-plume::modal.title
--}}
<h3 {{ $attributes->merge(['class' => 'text-lg font-semibold leading-none tracking-tight']) }}>
    {{ $slot }}
</h3>
