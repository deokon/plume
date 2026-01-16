<?php

use Illuminate\Support\Facades\Blade;

test('kbd renders correctly', function () {
    $view = Blade::render('<x-plume::kbd>Ctrl</x-plume::kbd>');

    expect($view)
        ->toContain('kbd')
        ->toContain('Ctrl')
        ->toContain('inline-flex');
});

test('kbd renders sizes', function () {
    $view = Blade::render('<x-plume::kbd size="lg">Shift</x-plume::kbd>');
    expect($view)->toContain('text-sm');
});
