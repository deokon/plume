{{--
@component x-plume::audio
@description A styled native HTML5 audio player wrapper.
@prop string $src (Default: null) The URL of the audio file.
@prop bool $autoplay (Default: false) Whether to start playing automatically.
@prop bool $controls (Default: true) Whether to show the audio controls.
@prop bool $loop (Default: false) Whether to restart the audio automatically when it ends.
@prop bool $muted (Default: false) Whether the audio should be muted by default.
@prop string $onPlay (Default: null) AlpineJS expression or function to call when playback starts.
@prop string $onPause (Default: null) AlpineJS expression or function to call when playback pauses.
@prop string $onEnded (Default: null) AlpineJS expression or function to call when playback ends.
@usage
<x-plume::audio src="/assets/podcast.mp3" on-play="console.log('Playing')" />
--}}
<div x-data="audio({{ $autoplay ? 'true' : 'false' }}, { 
        onPlay: {{ Js::from($onPlay) }}, 
        onPause: {{ Js::from($onPause) }}, 
        onEnded: {{ Js::from($onEnded) }} 
    })"
    {{ $attributes->merge(['class' => 'inline-block w-full rounded-full bg-background-100 dark:bg-background-800 p-1']) }}>
    <audio x-ref="audio" src="{{ $src }}" @if ($autoplay) autoplay @endif
        @if ($controls) controls @endif
        @if ($loop) loop @endif @if ($muted) muted @endif
        class="w-full h-8">
        Your browser does not support the audio tag.
    </audio>
</div>
