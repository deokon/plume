{{--
@component x-plume::button-group
--}}
<div role="group" {{ $attributes->merge(['class' => $groupClasses]) }}>
    {{ $slot }}
</div>