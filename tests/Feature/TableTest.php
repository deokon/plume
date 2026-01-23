<?php

use Illuminate\Support\Facades\Blade;

test('table renders correctly', function () {
    $view = Blade::render('<x-plume::table>Content</x-plume::table>');
    expect($view)->toContain('table')->toContain('Content');
});

test('table supports sticky header', function () {
    $view = Blade::render('<x-plume::table sticky-header><x-plume::table.thead sticky>Head</x-plume::table.thead></x-plume::table>');
    expect($view)
        ->toContain('max-h-[500px]')
        ->toContain('sticky top-0');
});

test('table cells support alignment', function () {
    $view = Blade::render('
        <x-plume::table>
            <x-plume::table.tr>
                <x-plume::table.td align="right">Data</x-plume::table.td>
            </x-plume::table.tr>
        </x-plume::table>
    ');
    expect($view)->toContain('text-right');
});
