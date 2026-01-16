<?php

use Illuminate\Support\Facades\Blade;

test('toaster renders correctly', function () {
    $view = Blade::render('<x-plume::toaster />');
    expect($view)
        ->toContain('bottom-0 right-0')
        ->toContain("filter(t => (t.position || 'bottom-right') === 'bottom-right')");
});

test('toaster renders different positions', function () {
    $view = Blade::render('<x-plume::toaster position="top-left" />');
    expect($view)
        ->toContain('top-0 left-0')
        ->toContain("filter(t => (t.position || 'bottom-right') === 'top-left')");
    
    $view = Blade::render('<x-plume::toaster position="top-right" />');
    expect($view)
        ->toContain('top-0 right-0')
        ->toContain("filter(t => (t.position || 'bottom-right') === 'top-right')");
    
    $view = Blade::render('<x-plume::toaster position="bottom-left" />');
    expect($view)
        ->toContain('bottom-0 left-0')
        ->toContain("filter(t => (t.position || 'bottom-right') === 'bottom-left')");
});
