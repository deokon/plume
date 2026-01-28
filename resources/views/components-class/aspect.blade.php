{{--
@component x-plume::aspect
@description A container component to maintain consistent proportions for media and content.
@prop string $ratio (Default: 'video') The aspect ratio: 'square' (1:1), 'video' (16:9), 'standard' (4:3), 'portrait' (3:4), 'cinema' (21:9), 'vertical' (9:16). Supports both '4/3' and '4:3' notations.
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
