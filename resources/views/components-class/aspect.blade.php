{{--
@component x-plume::aspect
@description A container component to maintain consistent proportions for media and content.
--}}
<div {{ $attributes->merge(['class' => 'relative w-full overflow-hidden ' . $ratioClass]) }}>
    <div class="absolute inset-0 w-full h-full">
        {{ $slot }}
    </div>
</div>