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

test('mobile menu renders correctly via slot', function () {
    $view = Blade::render('
        <x-plume::navbar>
            <x-slot:mobileMenu>
                <x-plume::navbar.mobile-menu>
                    <x-plume::navbar.mobile-item>Mobile Item</x-plume::navbar.mobile-item>
                </x-plume::navbar.mobile-menu>
            </x-slot:mobileMenu>
        </x-plume::navbar>
    ');
    
    expect($view)
        ->toContain('Mobile Item')
        ->toContain('sm:hidden')
        ->toContain('x-data="{ mobileOpen: false }"');
});

test('navbar renders with slots', function () {
    $template = <<<'BLADE'
<x-plume::navbar>
    <x-slot:left>Left Content</x-slot:left>
    <x-slot:center>Center Content</x-slot:center>
    <x-slot:right>Right Content</x-slot:right>
</x-plume::navbar>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Left Content')
        ->toContain('Center Content')
        ->toContain('Right Content');
});

test('navbar supports sticky prop', function () {
    $view = Blade::render('<x-plume::navbar sticky />');
    expect($view)->toContain('sticky top-0 z-50');
});

test('navbar supports automatic mobile menu', function () {
    $template = <<<'BLADE'
<x-plume::navbar>
    <x-slot:left>Logo</x-slot:left>
    <x-slot:mobile>Mobile Content</x-slot:mobile>
</x-plume::navbar>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Logo')
        ->toContain('Mobile Content')
        ->toContain('x-data="{ mobileOpen: false }"')
        ->toContain('icon-[fluent--line-horizontal-3-20-regular]'); // default mobile icon
});

test('navbar logo takes href', function () {
    $view = Blade::render('<x-plume::navbar.logo href="/home">Brand</x-plume::navbar.logo>');
    expect($view)
        ->toContain('href="/home"')
        ->toContain('Brand');
});
