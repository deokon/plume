<?php

use Illuminate\Support\Facades\Blade;

test('command component renders correctly', function () {
    $view = Blade::render('
        <x-plume::command trigger="Open">
            <x-plume::command.item>Item</x-plume::command.item>
        </x-plume::command>
    ');

    expect($view)
        ->toContain('x-data="command')
        ->toContain('Open')
        ->toContain('Item')
        ->toContain('fixed inset-0');
});

test('command component renders with callback props', function () {
    $view = Blade::render('
        <x-plume::command trigger="Open" on-open="console.log(\'open\')" on-close="console.log(\'close\')">
            <x-plume::command.item>Item</x-plume::command.item>
        </x-plume::command>
    ');

    expect($view)
        ->toContain('onOpen:')
        ->toContain('open')
        ->toContain('onClose:')
        ->toContain('close');
});

