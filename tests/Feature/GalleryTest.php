<?php

use Illuminate\Support\Facades\Blade;

test('gallery renders correctly', function () {
    $view = Blade::render('<x-plume::gallery>Content</x-plume::gallery>');

    expect($view)
        ->toContain('grid')
        ->toContain('grid-cols-1')
        ->toContain('sm:grid-cols-2')
        ->toContain('lg:grid-cols-3')
        ->toContain('gap-4')
        ->toContain('Content');
});

test('gallery supports responsive columns via cols prop', function () {
    $view2col = Blade::render('<x-plume::gallery cols="2">Content</x-plume::gallery>');
    expect($view2col)->toContain('grid-cols-1 sm:grid-cols-2');

    $view4col = Blade::render('<x-plume::gallery cols="4">Content</x-plume::gallery>');
    expect($view4col)->toContain('grid-cols-2 sm:grid-cols-3 lg:grid-cols-4');
});

test('gallery supports minCols and maxCols', function () {
    $view = Blade::render('<x-plume::gallery minCols="2" maxCols="4">Content</x-plume::gallery>');
    
    expect($view)
        ->toContain('grid-cols-2')
        ->toContain('sm:grid-cols-3')
        ->toContain('lg:grid-cols-4');
});

test('gallery supports custom gap', function () {
    $view = Blade::render('<x-plume::gallery gap="6">Content</x-plume::gallery>');
    expect($view)->toContain('gap-6');
});
