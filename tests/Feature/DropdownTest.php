<?php

use Illuminate\Support\Facades\Blade;

test('dropdown renders correctly', function () {
    $view = Blade::render('
        <x-plume::dropdown trigger="Open">
            <x-plume::dropdown.item href="#">Item</x-plume::dropdown.item>
        </x-plume::dropdown>
    ');

    expect($view)
        ->toContain('x-data')
        ->toContain('Open')
        ->toContain('Item')
        ->toContain('absolute z-50');
});

test('dropdown renders with callback props', function () {
    $view = Blade::render('
        <x-plume::dropdown trigger="Open" on-open="console.log(\'open\')" on-close="console.log(\'close\')">
            <x-plume::dropdown.item href="#">Item</x-plume::dropdown.item>
        </x-plume::dropdown>
    ');

    expect($view)
        ->toContain('onOpen:')
        ->toContain('open')
        ->toContain('onClose:')
        ->toContain('close');
});

