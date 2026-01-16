<?php

use Illuminate\Support\Facades\Blade;

test('navbar renders correctly', function () {
    $view = Blade::render('
        <x-plume::navbar>
            <x-plume::navbar.logo>Logo</x-plume::navbar.logo>
            <x-plume::navbar.menu>
                <x-plume::navbar.item>Item</x-plume::navbar.item>
            </x-plume::navbar.menu>
            <x-plume::navbar.mobile-toggle />
        </x-plume::navbar>
    ');

    expect($view)
        ->toContain('nav')
        ->toContain('Logo')
        ->toContain('Item')
        ->toContain('sm:flex');
});

test('mobile menu renders correctly', function () {
    $view = Blade::render('
        <div x-data="{ mobileOpen: true }">
            <x-plume::navbar.mobile-menu>
                <x-plume::navbar.mobile-item>Mobile Item</x-plume::navbar.mobile-item>
            </x-plume::navbar.mobile-menu>
        </div>
    ');
    
    expect($view)
        ->toContain('Mobile Item')
        ->toContain('sm:hidden');
});
