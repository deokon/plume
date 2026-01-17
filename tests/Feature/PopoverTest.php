<?php

use Illuminate\Support\Facades\Blade;

test('popover renders correctly', function () {
    $view = Blade::render('
        <x-plume::popover trigger="Open">
            Content
        </x-plume::popover>
    ');

    expect($view)
        ->toContain('x-data')
        ->toContain('Open')
        ->toContain('Content')
        ->toContain('absolute z-50');
});

test('popover renders with trigger slot', function () {
    $view = Blade::render('
        <x-plume::popover>
            <x-slot:trigger>
                <button>Custom Trigger</button>
            </x-slot:trigger>
            Content
        </x-plume::popover>
    ');

    expect($view)
        ->toContain('Custom Trigger')
        ->toContain('Content');
});
