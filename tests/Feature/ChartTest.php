<?php

use Illuminate\Support\Facades\Blade;

test('chart renders correctly', function () {
    $data = [
        ['label' => 'A', 'value' => 10],
        ['label' => 'B', 'value' => 20],
    ];
    
    $view = Blade::render('<x-plume::chart :data="$data" />', ['data' => $data]);

    expect($view)
        ->toContain('x-data')
        ->toContain('svg')
        ->toContain('rect') // Bar chart default
        ->toContain('value');
});

test('chart renders line type', function () {
     $data = [
        ['label' => 'A', 'value' => 10],
        ['label' => 'B', 'value' => 20],
    ];
    
    $view = Blade::render('<x-plume::chart type="line" :data="$data" />', ['data' => $data]);
    expect($view)->toContain('polyline');
});
