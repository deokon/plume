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
    <x-plume::accordion.item title="Section 1" id="s1">Content 1</x-plume::accordion.item>
    <x-plume::accordion.item title="Section 2" id="s2">Content 2</x-plume::accordion.item>
</x-plume::accordion>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Section 1')
        ->toContain('Content 1')
        ->toContain('Section 2')
        ->toContain('Content 2')
        ->toContain('x-data="accordion(false)"')
        ->toContain('x-data="accordionItem(\'s1\', false)"')
        ->toContain('x-data="accordionItem(\'s2\', false)"');
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

test('button group passes size to children', function () {
    $template = <<<'BLADE'
<x-plume::button-group size="sm">
    <x-plume::button>Small</x-plume::button>
</x-plume::button-group>
BLADE;

    $view = Blade::render($template);
    // sm size uses 'text-sm font-medium gap-1.5 px-3 py-1.5'
    expect($view)->toContain('px-3 py-1.5');
});

test('tabs pass size and side to children', function () {
    $template = <<<'BLADE'
<x-plume::tabs side="left" size="sm" default="tab1">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="tab1">Tab 1</x-plume::tabs.item>
    </x-plume::tabs.group>
    <x-plume::tabs.panel for="tab1">Panel 1</x-plume::tabs.panel>
</x-plume::tabs>
BLADE;

    $view = Blade::render($template);
    // side="left" uses 'border-r-3 rounded-l-md' in tabs.item
    expect($view)->toContain('border-r-3 rounded-l-md');
    // size="sm" passes to button inside tabs.item: 'px-3 py-1.5'
    expect($view)->toContain('px-3 py-1.5');
    // side="left" passes to tabs.panel: 'border-r rounded-r-md'
    expect($view)->toContain('border-r rounded-r-md');
});

test('tabs pass style and shape to children', function () {
    $template = <<<'BLADE'
<x-plume::tabs style="outline" shape="pill" default="tab1">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="tab1">Tab 1</x-plume::tabs.item>
    </x-plume::tabs.group>
</x-plume::tabs>
BLADE;

    $view = Blade::render($template);
    // shape="pill" uses 'rounded-full' in button
    expect($view)->toContain('rounded-full');
    // style="outline" uses 'border bg-none' in button
    expect($view)->toContain('border bg-none');
});

test('breadcrumb renders with items correctly', function () {
    $items = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Docs', 'href' => '/docs'],
        ['label' => 'Current', 'active' => true],
    ];

    $view = Blade::render('<x-plume::breadcrumb :items="$items" />', ['items' => $items]);
    
    expect($view)
        ->toContain('Home')
        ->toContain('href="/"')
        ->toContain('Docs')
        ->toContain('href="/docs"')
        ->toContain('Current')
        ->toContain('aria-current="page"')
        ->toContain('icon-[fluent--chevron-right-24-regular]'); // Default separator
});

test('dropdown renders with trigger slot', function () {
    $template = <<<'BLADE'
<x-plume::dropdown>
    <x-slot:trigger>Menu</x-slot:trigger>
    <x-plume::dropdown.item>Item 1</x-plume::dropdown.item>
</x-plume::dropdown>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Menu')
        ->toContain('Item 1')
        ->toContain('x-data="{ open: false }"');
});

test('dropdown renders with trigger prop', function () {
    $template = <<<'BLADE'
<x-plume::dropdown trigger="Options">
    <x-plume::dropdown.item>Item 1</x-plume::dropdown.item>
</x-plume::dropdown>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('Options')
        ->toContain('icon-[fluent--chevron-down-12-filled]') // Default icon
        ->toContain('Item 1');
});

test('dropdown renders with custom trigger style', function () {
    $template = <<<'BLADE'
<x-plume::dropdown trigger="Options" triggerStyle="outline">
    <x-plume::dropdown.item>Item 1</x-plume::dropdown.item>
</x-plume::dropdown>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('border bg-none shadow-xs'); // Outline style classes
});

test('dropdown uses outline style by default', function () {
    $template = <<<'BLADE'
<x-plume::dropdown trigger="Options">
    <x-plume::dropdown.item>Item 1</x-plume::dropdown.item>
</x-plume::dropdown>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('border bg-none shadow-xs'); // Outline style classes
});


test('card renders as link when href is provided', function () {
    $template = <<<'BLADE'
<x-plume::card href="https://example.com" title="Clickable Card">
    Content
</x-plume::card>
BLADE;

    $view = Blade::render($template);
    expect($view)
        ->toContain('<a')
        ->toContain('href="https://example.com"')
        ->toContain('Clickable Card')
        ->toContain('transition-all hover:bg-background-50')
        ->toContain('hover:scale-[1.01] hover:shadow-lg');
});
