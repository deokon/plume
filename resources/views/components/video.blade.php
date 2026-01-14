@props([
    'src',
    'poster' => null,
    'autoplay' => false,
    'controls' => true,
    'loop' => false,
    'muted' => false,
    'aspect' => 'video',
])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg bg-black']) }}>
    <div @class([
        'relative w-full',
        match($aspect) {
            'video' => 'aspect-video',
            'square' => 'aspect-square',
            '21/9' => 'aspect-[21/9]',
            default => 'aspect-video',
        }
    ])>
        <video 
            src="{{ $src }}" 
            @if($poster) poster="{{ $poster }}" @endif
            @if($autoplay) autoplay @endif
            @if($controls) controls @endif
            @if($loop) loop @endif
            @if($muted) muted @endif
            class="h-full w-full object-cover"
        >
            Your browser does not support the video tag.
        </video>
    </div>
</div>
