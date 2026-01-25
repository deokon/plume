<?php

use Illuminate\Support\Facades\Blade;

test('avatar renders safely with empty props', function () {
    $view = Blade::render('<x-plume::avatar />');
    expect($view)->toContain('rounded-full');
});

test('badge renders safely with empty slot', function () {
    $view = Blade::render('<x-plume::badge></x-plume::badge>');
    expect($view)->toContain('bg-primary');
});

test('button renders safely with empty slot', function () {
    $view = Blade::render('<x-plume::button></x-plume::button>');
    expect($view)->toContain('button');
});

test('card renders safely with no content', function () {
    $view = Blade::render('<x-plume::card />');
    expect($view)->toContain('rounded-xl');
});

test('alert renders safely with no content', function () {
    $view = Blade::render('<x-plume::alert />');
    expect($view)->toContain('bg-background-100');
});

test('progress handles out of bounds values', function () {
    $view = Blade::render('<x-plume::progress value="-10" max="100" />');
    expect($view)->toContain('width: 0%'); // 0% filled

    $view2 = Blade::render('<x-plume::progress value="150" max="100" />');
    expect($view2)->toContain('width: 100%'); // 100% filled
});

test('tabs handle missing default active tab', function () {
    $view = Blade::render('
        <x-plume::tabs>
            <x-plume::tabs.group>
                <x-plume::tabs.item for="tab1">Tab 1</x-plume::tabs.item>
            </x-plume::tabs.group>
            <x-plume::tabs.panel for="tab1">Content</x-plume::tabs.panel>
        </x-plume::tabs>
    ');
    // It should default to first tab or handle it gracefully?
    // Current implementation defaults 'default' prop to '1'.
    expect($view)->toContain('x-data="tabs(\'1\', { onTabChange: null })"');
});

