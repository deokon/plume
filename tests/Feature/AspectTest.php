<?php

use Illuminate\Support\Facades\Blade;

test('aspect ratio component renders correctly', function () {
    $view = Blade::render('<x-plume::aspect ratio="square">Content</x-plume::aspect>');

    expect($view)
        ->toContain('aspect-square')
        ->toContain('Content');
});

test('aspect ratio component supports common ratios', function () {
    $ratios = [
        '16/9' => 'aspect-video',
        'square' => 'aspect-square',
        '1/1' => 'aspect-square',
        '4/3' => 'aspect-[4/3]',
        'cinema' => 'aspect-[21/9]',
    ];

    foreach ($ratios as $input => $expected) {
        $view = Blade::render("<x-plume::aspect ratio=\"$input\">Content</x-plume::aspect>");
        expect($view)->toContain($expected);
    }
});

test('aspect ratio component supports custom ratios', function () {
    $view = Blade::render('<x-plume::aspect ratio="2/1">Content</x-plume::aspect>');
    expect($view)->toContain('aspect-[2/1]');
});

