<?php

use Illuminate\Support\Facades\Blade;

test('toaster renders correctly', function () {
    $view = Blade::render('<x-plume::toaster />');
    expect($view)
        ->toContain('bottom-0 right-0')
        ->toContain('$store.toasts.items');
});

test('toaster renders different positions', function () {
    $view = Blade::render('<x-plume::toaster position="top-left" />');
    expect($view)
        ->toContain('top-0 left-0')
        ->toContain('$store.toasts.items');
    
    $view = Blade::render('<x-plume::toaster position="top-right" />');
    expect($view)
        ->toContain('top-0 right-0')
        ->toContain('$store.toasts.items');
    
    $view = Blade::render('<x-plume::toaster position="top-center" />');
    expect($view)
        ->toContain('top-0 left-1/2 -translate-x-1/2')
        ->toContain('$store.toasts.items');

    $view = Blade::render('<x-plume::toaster position="bottom-left" />');
    expect($view)
        ->toContain('bottom-0 left-0')
        ->toContain('$store.toasts.items');

    $view = Blade::render('<x-plume::toaster position="bottom-center" />');
    expect($view)
        ->toContain('bottom-0 left-1/2 -translate-x-1/2')
        ->toContain('$store.toasts.items');
});