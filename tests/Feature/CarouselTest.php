<?php

use Illuminate\Support\Facades\Blade;

test('carousel renders correctly', function () {
    $view = Blade::render('
        <x-plume::carousel>
            <x-plume::carousel.item>Slide 1</x-plume::carousel.item>
            <x-plume::carousel.item>Slide 2</x-plume::carousel.item>
        </x-plume::carousel>
    ');

    expect($view)
        ->toContain('x-data="carousel(false, 3000, null, { onSlideChange: null })"')
        ->toContain('snap-x')
        ->toContain('Slide 1')
        ->toContain('Slide 2');
});

test('carousel renders indicators when enabled', function () {
    $view = Blade::render('<x-plume::carousel indicators />');
    expect($view)->toContain('absolute bottom-4');
});
