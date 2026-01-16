{{--
@component x-plume::popover.trigger
@description The element that triggers the popover.
--}}
<div @click="toggle" {{ $attributes->merge(['class' => 'inline-flex cursor-pointer']) }}>
    {{ $slot }}
</div>
