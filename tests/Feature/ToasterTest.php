<?php

use Illuminate\Support\Facades\Blade;

test('toaster renders correctly', function () {
    $view = Blade::render('<x-plume::toaster />');
    expect($view)->toContain('bottom-0 right-0');
});

test('toaster renders different positions', function () {
    $view = Blade::render('<x-plume::toaster position="top-left" />');
    expect($view)->toContain('top-0 left-0');
    
    $view = Blade::render('<x-plume::toaster position="top-right" />');
    expect($view)->toContain('top-0 right-0');
    
    $view = Blade::render('<x-plume::toaster position="bottom-left" />');
    expect($view)->toContain('bottom-0 left-0');
});
