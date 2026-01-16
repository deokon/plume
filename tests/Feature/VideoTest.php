<?php

use Illuminate\Support\Facades\Blade;

test('video renders native video', function () {
    $view = Blade::render('<x-plume::video src="video.mp4" />');
    expect($view)
        ->toContain('<video')
        ->toContain('src="video.mp4"');
});

test('video renders youtube embed', function () {
    $view = Blade::render('<x-plume::video src="https://www.youtube.com/watch?v=123" />');
    expect($view)
        ->toContain('<iframe')
        ->toContain('src="https://www.youtube.com/embed/123"');
});

test('video renders vimeo embed', function () {
    $view = Blade::render('<x-plume::video src="https://vimeo.com/123" />');
    expect($view)
        ->toContain('<iframe')
        ->toContain('src="https://player.vimeo.com/video/123"');
});
