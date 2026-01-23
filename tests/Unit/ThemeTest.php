<?php

use deokon\Plume\Theme;

test('it returns correct button classes', function () {
    $classes = Theme::button('primary', 'md', 'default');
    expect($classes)->toContain('bg-primary')
        ->toContain('text-base')
        ->toContain('rounded-md');
});

test('it returns correct alert theme array', function () {
    $theme = Theme::alert('success');
    expect($theme)->toBeArray()
        ->toHaveKey('container')
        ->toHaveKey('icon')
        ->toHaveKey('icon_name');
    
    expect($theme['container'])->toContain('bg-primary-100');
    expect($theme['icon_name'])->toBe('icon-[fluent--checkmark-circle-24-regular]');
});

test('it returns correct badge style classes', function () {
    $classes = Theme::badge('error');
    expect($classes)->toContain('bg-error-600');
});

test('it returns correct avatar sizes', function () {
    $sizes = Theme::avatar('lg');
    expect($sizes)->toBeArray()
        ->toHaveKey('container')
        ->toHaveKey('status');
    
    expect($sizes['container'])->toBe('size-10 text-base');
    expect($sizes['status'])->toBe('size-3');
});

test('it returns correct spinner classes', function () {
    $classes = Theme::spinner('xl', 'error');
    expect($classes)->toContain('size-12')->toContain('text-error');
});
