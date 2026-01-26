{{--
@component x-plume::spacer
@description A utility component that fills available space in a flex container (using flex-grow).
@usage
<div class="flex items-center">
    <span>Left</span>
    <x-plume::spacer />
    <span>Right</span>
</div>
--}}
<div {{ $attributes->merge(['class' => 'grow']) }}></div>
