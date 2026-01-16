<?php

use Illuminate\Support\Facades\Blade;

test('calendar renders range mode', function () {
    $view = Blade::render('<x-plume::calendar mode="range" />');
    expect($view)
        ->toContain('x-data="calendar(')
        ->toContain("'range'")
        ->toContain('x-modelable="value"');
});

test('calendar renders restrictions', function () {
    $view = Blade::render('<x-plume::calendar min="2023-01-01" max="2023-12-31" />');
    expect($view)
        ->toContain('x-data="calendar(')
        ->toContain("'2023-01-01'")
        ->toContain("'2023-12-31'");
});
