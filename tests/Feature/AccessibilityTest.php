<?php

use Illuminate\Support\Facades\Blade;

test('pagination has required aria attributes', function () {
    $view = Blade::render('<x-plume::pagination :total="5" :current="2" />');
    expect($view)->toContain('aria-label="Pagination"');
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

test('form input has required aria attributes', function () {
    $view = Blade::render('<x-plume::form.input label="Email" name="email" model="email" />');
    expect($view)->toContain('for="email"');
    expect($view)->toContain('aria-live="assertive"');
});

test('form checkbox has required aria attributes', function () {
    $view = Blade::render('<x-plume::form.checkbox label="Accept" name="accept" model="accept" />');
    expect($view)->toContain('for="accept"');
    expect($view)->toContain('aria-live="assertive"');
});

test('form combobox has required aria attributes', function () {
    $view = Blade::render('<x-plume::form.combobox label="Choice" name="choice" model="choice" :options="[\'a\' => \'A\']" />');
    expect($view)->toContain('role="combobox"')->toContain('aria-haspopup="listbox"');
});

test('accordion has required aria attributes', function () {
    $template = <<<'BLADE'
<x-plume::accordion>
    <x-plume::accordion.item title="Item 1" id="item-1">Content</x-plume::accordion.item>
</x-plume::accordion>
BLADE;
    $view = Blade::render($template);
    expect($view)->toContain('type="button"');
    expect($view)->toContain(':aria-expanded="isOpen"');
});

test('tabs have required aria attributes', function () {
    $template = <<<'BLADE'
<x-plume::tabs default="t1">
    <x-plume::tabs.group>
        <x-plume::tabs.item for="t1">Tab 1</x-plume::tabs.item>
    </x-plume::tabs.group>
    <x-plume::tabs.panel for="t1">Panel 1</x-plume::tabs.panel>
</x-plume::tabs>
BLADE;
    $view = Blade::render($template);
    expect($view)->toContain('x-on:click="activeTab = \'t1\'"');
});

test('dropdown has required aria attributes', function () {
    $view = Blade::render('<x-plume::dropdown trigger="Open" />');
    expect($view)->toContain('type="button"');
});

test('modal has required aria attributes', function () {
    $view = Blade::render('<x-plume::modal name="m1" title="Test Modal">Content</x-plume::modal>');
    expect($view)->toContain('role="dialog"')->toContain('aria-modal="true"')->toContain('aria-labelledby="modal-title-m1"');
});

test('drawer has required aria attributes', function () {
    $view = Blade::render('<x-plume::drawer name="d1" title="Test Drawer">Content</x-plume::drawer>');
    expect($view)->toContain('role="dialog"')->toContain('aria-modal="true"')->toContain('aria-labelledby="drawer-title-d1"');
});

test('alert-dialog has required aria attributes', function () {
    $view = Blade::render('<x-plume::alert-dialog name="ad1">Content</x-plume::alert-dialog>');
    expect($view)->toContain('role="alertdialog"')->toContain('aria-labelledby="ad1-title"')->toContain('aria-describedby="ad1-description"');
});

test('breadcrumb has required aria attributes', function () {
    $items = [['label' => 'Home', 'href' => '/'], ['label' => 'Now', 'active' => true]];
    $view = Blade::render('<x-plume::breadcrumb :items="$items" />', ['items' => $items]);
    expect($view)->toContain('aria-label="Breadcrumb"');
    expect($view)->toContain('aria-current="page"');
});

test('command has required aria attributes', function () {
    $view = Blade::render('<x-plume::command trigger="Cmd" />');
    expect($view)->toContain('role="button"')->toContain('aria-haspopup="listbox"');
    expect($view)->toContain('role="dialog"')->toContain('role="combobox"')->toContain('role="listbox"');
});

