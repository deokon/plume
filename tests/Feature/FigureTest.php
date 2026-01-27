<?php

use Illuminate\Support\Facades\Blade;

test('figure renders correctly', function () {
    $view = Blade::render('<x-plume::figure src="img.jpg" alt="test" />');
    expect($view)->toContain('img')->toContain('src="img.jpg"')->toContain('alt="test"');
});

test('figure renders caption', function () {
    $view = Blade::render('<x-plume::figure src="img.jpg" caption="My Caption" />');
    expect($view)->toContain('figcaption')->toContain('My Caption');
});

test('figure renders srcset and sizes', function () {
    $view = Blade::render('<x-plume::figure src="img.jpg" srcset="img-400.jpg 400w" sizes="(max-width: 600px) 400px" />');
    expect($view)
        ->toContain('srcset="img-400.jpg 400w"')
        ->toContain('sizes="(max-width: 600px) 400px"');
});

test('figure renders sources slot', function () {
    $view = Blade::render('
        <x-plume::figure src="test.jpg">
            <x-slot:sources>
                <source srcset="test.webp" type="image/webp">
            </x-slot:sources>
        </x-plume::figure>
    ');

    expect($view)
        ->toContain('<picture>')
        ->toContain('srcset="test.webp"')
        ->toContain('type="image/webp"');
});

test('figure renders aspect ratio', function () {
    $view = Blade::render('<x-plume::figure src="test.jpg" aspect="16/9" />');
    expect($view)->toContain('aspect-video');

    $view2 = Blade::render('<x-plume::figure src="test.jpg" aspect="4/3" />');
    expect($view2)->toContain('aspect-[4/3]');
});
