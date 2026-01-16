<?php

use Illuminate\Support\Facades\Blade;

test('popover renders correctly', function () {
    $view = Blade::render('
        <x-plume::popover>
            <x-plume::popover.trigger>Open</x-plume::popover.trigger>
            <x-plume::popover.content>Content</x-plume::popover.content>
        </x-plume::popover>
    ');

    expect($view)
        ->toContain('x-data')
        ->toContain('Open')
        ->toContain('Content')
        ->toContain('absolute z-50');
});
