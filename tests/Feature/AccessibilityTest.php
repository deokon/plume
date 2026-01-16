<?php

use Illuminate\Support\Facades\Blade;

test('pagination has required aria attributes', function () {
    $view = Blade::render('<x-plume::pagination :total="5" :current="2" />');
    expect($view)->toContain('aria-label="Pagination"');
    // Note: Desktop active page highlighting is client-side via AlpineJS in our refactored component,
    // but the mobile info section should contain the current page.
    expect($view)->toContain('x-text="current"');
});

test('buttons have required aria attributes', function () {
    $view = Blade::render('<x-plume::button aria-label="Close Action">X</x-plume::button>');
    expect($view)->toContain('aria-label="Close Action"');
});

test('spinner has required aria attributes', function () {
    $view = Blade::render('<x-plume::spinner />');
    expect($view)->toContain('role="status"')->toContain('aria-label="loading"')->toContain('sr-only');
});

test('form element has required aria attributes', function () {
    $view = Blade::render('<x-plume::form.input label="Email" name="email" model="email" />');
    expect($view)->toContain('for="email"');
    
    // Check for error aria-live container
    expect($view)->toContain('aria-live="assertive"');
});
