<?php

use Illuminate\Support\Facades\Blade;

test('pagination component renders correctly', function () {
    $view = Blade::render('<x-plume::pagination :total="10" :current="1" />');

    expect($view)
        ->toContain('x-data="pagination')
        ->toContain('Previous')
        ->toContain('Next')
        ->toContain('10');
});

test('pagination component renders with callback prop', function () {
    $view = Blade::render('
        <x-plume::pagination 
            :total="10" 
            :current="1" 
            on-page-change="console.log($event.detail.page)" 
        />');

    expect($view)
        ->toContain('onPageChange:')
        ->toContain('console.log($event.detail.page)');
});
