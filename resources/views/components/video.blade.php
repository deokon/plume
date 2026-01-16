{{--
@component x-plume::video
@description A styled wrapper for HTML5 video, YouTube, and Vimeo content.
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

@php
    $isYoutube = Str::contains($src, ['youtube.com', 'youtu.be']);
    $isVimeo = Str::contains($src, ['vimeo.com']);
    $isEmbed = $isYoutube || $isVimeo;

    $embedSrc = $src;
    if ($isYoutube) {
        if (Str::contains($src, 'watch?v=')) {
            parse_str(parse_url($src, PHP_URL_QUERY), $args);
            $id = $args['v'] ?? null;
            $embedSrc = "https://www.youtube.com/embed/$id";
        } elseif (Str::contains($src, 'youtu.be/')) {
            $id = last(explode('/', $src));
            $embedSrc = "https://www.youtube.com/embed/$id";
        }
    } elseif ($isVimeo) {
        if (preg_match('/vimeo\.com\/(\d+)/', $src, $matches)) {
            $id = $matches[1];
            $embedSrc = "https://player.vimeo.com/video/$id";
        }
    }
@endphp

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg bg-black']) }}>
    <div 
        @class([
            'relative w-full group',
            match($aspect) {
                'video' => 'aspect-video',
                'square' => 'aspect-square',
                '21/9' => 'aspect-[21/9]',
                default => 'aspect-video',
            }
        ])
        @if(!$isEmbed)
        x-data="video({{ $autoplay ? 'true' : 'false' }})"
        @endif
    >
        @if($isEmbed)
            <iframe 
                src="{{ $embedSrc }}" 
                class="h-full w-full" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen
            ></iframe>
        @else
            <video 
                x-ref="video"
                src="{{ $src }}" 
                @if($poster) poster="{{ $poster }}" @endif
                @if($autoplay) autoplay @endif
                @if($controls) controls @endif
                @if($loop) loop @endif
                @if($muted) muted @endif
                class="h-full w-full object-cover"
                @play="playing = true"
                @pause="playing = false"
                @click="toggle"
            >
                Your browser does not support the video tag.
            </video>
            
            {{-- Play Button Overlay --}}
            <div 
                x-show="!playing" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="absolute inset-0 flex items-center justify-center bg-black/30 cursor-pointer"
                @click="toggle"
            >
                <button class="flex items-center justify-center w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/30 transition-colors shadow-lg group-hover:scale-110">
                    <x-plume::icon i="icon-[fluent--play-24-filled]" class="size-8 text-white ml-1" />
                </button>
            </div>
        @endif
    </div>
</div>