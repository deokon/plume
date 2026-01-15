{{--
@component x-plume::video
@description A styled wrapper for HTML5 video content.
@prop {mixed} src - Required. Video file URL. (Default: required)
@prop {null} poster - Placeholder image URL. (Default: null)
@prop {boolean} autoplay - Start playback on load. (Default: false)
@prop {boolean} controls - Show player controls. (Default: true)
@prop {boolean} loop - Loop the video. (Default: false)
@prop {boolean} muted - Mute audio by default. (Default: false)
@prop {string} aspect - Options: video, square, 21/9. (Default: video)
--}}
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
