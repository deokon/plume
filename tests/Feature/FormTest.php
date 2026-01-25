<?php

use Illuminate\Support\Facades\Blade;

test('form renders with correct action and method', function () {
    $view = Blade::render('<x-plume::form action="/submit" method="PUT">Content</x-plume::form>');
    
    expect($view)
        ->toContain('action="/submit"')
        ->toContain('method="POST"') // Laravel spoofing
        ->toContain('name="_method" value="PUT"');
});

test('form passes config to alpine plugin', function () {
    $view = Blade::render('<x-plume::form hideOnSuccess resetOnSuccess>Content</x-plume::form>');
    
    expect($view)
        ->toContain('hideOnSuccess: true')
        ->toContain('resetOnSuccess: true');
});

test('form renders with initial data', function () {
    $data = ['name' => 'John', 'email' => 'john@example.com'];
    $view = Blade::render('<x-plume::form :formData="$data">Content</x-plume::form>', ['data' => $data]);
    
    expect($view)->toContain('JSON.parse')
        ->toContain('John')
        ->toContain('john@example.com');
});
