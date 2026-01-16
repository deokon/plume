<?php

use Illuminate\Support\Facades\Blade;

test('card renders named slots correctly', function () {
    $template = <<<'BLADE'
<x-plume::card>
    <x-plume::card.header>
        <x-plume::card.title>Title</x-plume::card.title>
    </x-plume::card.header>
    <x-plume::card.content>Content</x-plume::card.content>
    <x-plume::card.footer>Footer</x-plume::card.footer>
</x-plume::card>
BLADE;

    $view = Blade::render($template);
    expect($view)->toContain('Title')->toContain('Content')->toContain('Footer');
});

test('modal renders with required attributes', function () {
    $view = Blade::render('<x-plume::modal name="test-modal">Modal Content</x-plume::modal>');
    expect($view)->toContain('x-data="modal(\'test-modal\'')
        ->toContain('x-show="show"')
        ->toContain('Modal Content');
});

test('drawer renders correctly', function () {
    $view = Blade::render('<x-plume::drawer name="test-drawer" side="left">Drawer Content</x-plume::drawer>');
    expect($view)->toContain('x-on:open-drawer.window')
        ->toContain('-translate-x-full')
        ->toContain('Drawer Content');
});

test('accordion renders items correctly', function () {
    $template = <<<'BLADE'
<x-plume::accordion>
    <x-plume::accordion.item title="Section 1">Content 1</x-plume::accordion.item>
</x-plume::accordion>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Section 1')
        ->toContain('Content 1')
        ->toContain('x-data="accordion(false)"');
});

test('tabs render correctly', function () {
    $template = <<<'BLADE'
<x-plume::tabs default="tab1">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="tab1">Tab 1</x-plume::tabs.item>
    </x-plume::tabs.group>
    <x-plume::tabs.panel for="tab1">Panel 1</x-plume::tabs.panel>
</x-plume::tabs>
BLADE;

    $view = Blade::render($template);
    expect($view)->toContain('x-data="{ activeTab: \'tab1\' }"')
        ->toContain('Tab 1')
        ->toContain('Panel 1');
});

