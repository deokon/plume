{{--
@component x-plume::card.title
--}}
<h3 {{ $attributes->merge(['class' => 'font-semibold leading-none tracking-tight']) }}>
    {{ $slot }}
</h3>
