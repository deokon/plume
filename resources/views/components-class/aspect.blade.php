{{--
@component x-plume::aspect
@description A container component to maintain consistent proportions for media and content.
@prop string $ratio (Default: 'video') The aspect ratio: 'video' (16:9), 'square' (1:1), 'cinema' (21:9).
@usage
<x-plume::aspect ratio="square" class="max-w-xs">
    <img src="/photo.jpg" class="object-cover w-full h-full" />
</x-plume::aspect>
--}}
<div {{ $attributes->merge(['class' => 'relative w-full overflow-hidden ' . $ratioClass]) }}>
    <div class="absolute inset-0 w-full h-full">
        {{ $slot }}
    </div>
</div>
