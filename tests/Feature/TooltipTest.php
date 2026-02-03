<?php

use Illuminate\Support\Facades\Blade;

test('tooltip component renders correctly', function () {
    $view = Blade::render('
        <x-plume::tooltip text="Hello">
            <button>Hover me</button>
        </x-plume::tooltip>
    ');

    expect($view)
        ->toContain('x-data')
        ->toContain('Hello')
        ->toContain('Hover me')
        ->toContain('absolute z-50');
});

test('tooltip component renders with callback props', function () {
    $view = Blade::render('
        <x-plume::tooltip text="Hello" on-show="console.log(\'show\')" on-hide="console.log(\'hide\')">
            <button>Hover me</button>
        </x-plume::tooltip>
    ');

    expect($view)
        ->toContain('onShow:')
        ->toContain('show')
        ->toContain('onHide:')
        ->toContain('hide');
});
