<?php

use Illuminate\Support\Facades\Blade;

test('alert dialog renders with correct attributes', function () {
    $view = Blade::render('
        <x-plume::alert-dialog name="test-dialog" show>
            <x-plume::alert-dialog.content>
                <x-plume::alert-dialog.title id="test-dialog-title">Title</x-plume::alert-dialog.title>
                <x-plume::alert-dialog.description id="test-dialog-description">Description</x-plume::alert-dialog.description>
            </x-plume::alert-dialog.content>
            <x-plume::alert-dialog.footer>
                <x-plume::alert-dialog.cancel>Cancel</x-plume::alert-dialog.cancel>
                <x-plume::alert-dialog.action>Ok</x-plume::alert-dialog.action>
            </x-plume::alert-dialog.footer>
        </x-plume::alert-dialog>
    ');

    expect($view)
        ->toContain('role="alertdialog"')
        ->toContain('aria-modal="true"')
        ->toContain('aria-labelledby="test-dialog-title"')
        ->toContain('aria-describedby="test-dialog-description"')
        ->toContain('Title')
        ->toContain('Description');
});
