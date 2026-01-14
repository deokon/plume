@props([
    'src',
    'autoplay' => false,
    'controls' => true,
    'loop' => false,
    'muted' => false,
])

<div {{ $attributes->merge(['class' => 'inline-block w-full rounded-full bg-background-100 dark:bg-background-800 p-1']) }}>
    <audio 
        src="{{ $src }}" 
        @if($autoplay) autoplay @endif
        @if($controls) controls @endif
        @if($loop) loop @endif
        @if($muted) muted @endif
        class="w-full h-8"
    >
        Your browser does not support the audio tag.
    </audio>
</div>
