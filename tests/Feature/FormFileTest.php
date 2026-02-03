<?php

use Illuminate\Support\Facades\Blade;

test('form file renders correctly', function () {
    $view = Blade::render('<x-plume::form.file label="Upload" name="file" />');

    expect($view)
        ->toContain('x-data="fileInput')
        ->toContain('Upload')
        ->toContain('name="file"');
});

test('form file renders with callback props', function () {
    $view = Blade::render(
        '<x-plume::form.file 
            label="Upload" 
            name="file" 
            on-file-select="console.log(\'selected\')" 
            on-clear="console.log(\'cleared\')" 
        />'
    );

    expect($view)
        ->toContain('onFileSelect:')
        ->toContain('selected')
        ->toContain('onClear:')
        ->toContain('cleared');
});

