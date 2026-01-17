<?php

use Illuminate\Support\Facades\Blade;

test('card renders named slots correctly', function () {
    $template = <<<'BLADE'
<x-plume::card title="Title" description="Description">
    Content
    <x-slot:footer>Footer</x-slot:footer>
</x-plume::card>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Title')
        ->toContain('Description')
        ->toContain('Content')
        ->toContain('Footer');
});

test('card renders with badge', function () {
    $template = <<<'BLADE'
<x-plume::card title="Project" badge="Active" badgeStyle="success">
    Content
</x-plume::card>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Project')
        ->toContain('Active')
        ->toContain('bg-primary'); // success badge uses primary color in Theme::badge
});

test('modal renders with required attributes', function () {
    $view = Blade::render('<x-plume::modal name="test-modal">Modal Content</x-plume::modal>');
    expect($view)->toContain('x-data="modal(\'test-modal\'')
        ->toContain('x-show="show"')
        ->toContain('Modal Content');
});

test('modal renders custom header slot', function () {
    $view = Blade::render('
        <x-plume::modal name="test-modal">
            <x-slot:header>Custom Header</x-slot:header>
            Content
        </x-plume::modal>
    ');
    expect($view)
        ->toContain('Custom Header')
        ->not->toContain('h3') // Default title styling
        ->toContain('pt-0'); // Content padding adjustment
});

test('drawer renders correctly', function () {
    $view = Blade::render('
        <x-plume::drawer name="test-drawer" side="left" title="Drawer Title">
            Drawer Content
            <x-slot:footer>Drawer Footer</x-slot:footer>
        </x-plume::drawer>
    ');
    expect($view)->toContain('x-data="drawer(\'test-drawer\'')
        ->toContain('-translate-x-full')
        ->toContain('Drawer Title')
        ->toContain('Drawer Content')
        ->toContain('Drawer Footer');
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

