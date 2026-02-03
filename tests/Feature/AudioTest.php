<?php

use Illuminate\Support\Facades\Blade;

test('audio component renders correctly', function () {
    $view = Blade::render('<x-plume::audio src="test.mp3" />');

    expect($view)
        ->toContain('x-data="audio')
        ->toContain('src="test.mp3"')
        ->toContain('x-ref="audio"');
});

test('audio component renders with callback props', function () {
    $view = Blade::render(
        '<x-plume::audio 
            src="test.mp3" 
            on-play="console.log(\'playing\')" 
            on-pause="console.log(\'paused\')" 
            on-ended="console.log(\'ended\')" 
        />'
    );

    expect($view)
        ->toContain('onPlay:')
        ->toContain('playing')
        ->toContain('onPause:')
        ->toContain('paused')
        ->toContain('onEnded:')
        ->toContain('ended');
});

