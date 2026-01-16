<?php

use Illuminate\Support\Facades\Blade;

test('calendar renders range mode', function () {
    $view = Blade::render('<x-plume::calendar mode="range" />');
    expect($view)
        ->toContain("mode: 'range'")
        ->toContain('rangeStart')
        ->toContain('rangeEnd');
});

test('calendar renders restrictions', function () {
    $view = Blade::render('<x-plume::calendar min="2023-01-01" max="2023-12-31" />');
    expect($view)
        ->toContain("minDate: '2023-01-01'")
        ->toContain("maxDate: '2023-12-31'");
});
