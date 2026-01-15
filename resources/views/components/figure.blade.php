{{--
@component x-plume::figure
@prop {mixed} src - Default: required
@prop {string} alt - Default: 
@prop {null} caption - Default: null
@prop {null} aspect - Default: null
--}}
@props([
    'src',
    'alt' => '',
    'caption' => null,
    'aspect' => null,
])

<figure {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg bg-background-100 dark:bg-background-800']) }}>
    <div @class([
        'relative w-full',
        match($aspect) {
            'square' => 'aspect-square',
            'video' => 'aspect-video',
            '4/3' => 'aspect-[4/3]',
            '3/2' => 'aspect-[3/2]',
            '21/9' => 'aspect-[21/9]',
            default => '',
        }
    ])>
        <img 
            src="{{ $src }}" 
            alt="{{ $alt }}" 
            class="h-full w-full object-cover"
            loading="lazy"
        >
    </div>
    @if($caption || $slot->isNotEmpty())
        <figcaption class="p-3 text-sm text-foreground/60 dark:text-background-400">
            {{ $caption ?? $slot }}
        </figcaption>
    @endif
</figure>
