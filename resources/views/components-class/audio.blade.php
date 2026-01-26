{{--
@component x-plume::audio
@description A styled native HTML5 audio player wrapper.
@prop string $src (Default: null) The URL of the audio file.
@prop bool $autoplay (Default: false) Whether to start playing automatically.
@prop bool $controls (Default: true) Whether to show the audio controls.
@prop bool $loop (Default: false) Whether to restart the audio automatically when it ends.
@prop bool $muted (Default: false) Whether the audio should be muted by default.
@usage
<x-plume::audio src="/assets/podcast.mp3" />
--}}
<div
    {{ $attributes->merge(['class' => 'inline-block w-full rounded-full bg-background-100 dark:bg-background-800 p-1']) }}>
    <audio src="{{ $src }}" @if ($autoplay) autoplay @endif
        @if ($controls) controls @endif
        @if ($loop) loop @endif @if ($muted) muted @endif
        class="w-full h-8">
        Your browser does not support the audio tag.
    </audio>
</div>
