<?php

use Illuminate\Support\Facades\Blade;

test('alert dialog renders with correct attributes', function () {
    $view = Blade::render('
        <x-plume::alert-dialog name="test-dialog" show title="Title">
            Description
        </x-plume::alert-dialog>
    ');

    expect($view)
        ->toContain('x-data="modal(\'test-dialog\'')
        ->toContain('role="alertdialog"')
        ->toContain('aria-modal="true"')
        ->toContain('aria-labelledby="test-dialog-title"')
        ->toContain('aria-describedby="test-dialog-description"')
        ->toContain('Title')
        ->toContain('Description');
});
