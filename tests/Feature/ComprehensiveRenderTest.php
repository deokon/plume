<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

test('all documented components render without errors', function () {
    $json = File::get(__DIR__ . '/../../plume-api.json');
    $api = json_decode($json, true);
    
    foreach ($api['components'] as $name => $meta) {
        // Handle components that require specific parent context
        $wrappers = [
            'x-plume::accordion-item' => ['<x-plume::accordion>', '</x-plume::accordion>'],
            'x-plume::breadcrumb-item' => ['<x-plume::breadcrumb>', '</x-plume::breadcrumb>'],
            'x-plume::carousel-item' => ['<x-plume::carousel>', '</x-plume::carousel>'],
            'x-plume::command-group' => ['<x-plume::command>', '</x-plume::command>'],
            'x-plume::command-item' => ['<x-plume::command><x-plume::command.group>', '</x-plume::command.group></x-plume::command>'],
            'x-plume::dropdown-item' => ['<x-plume::dropdown>', '</x-plume::dropdown>'],
            'x-plume::dropdown-separator' => ['<x-plume::dropdown>', '</x-plume::dropdown>'],
            'x-plume::navbar-item' => ['<x-plume::navbar><x-plume::navbar.menu>', '</x-plume::navbar.menu></x-plume::navbar>'],
            'x-plume::navbar-mobile-item' => ['<x-plume::navbar><x-plume::navbar.mobile-menu>', '</x-plume::navbar.mobile-menu></x-plume::navbar>'],
            'x-plume::navbar-menu' => ['<x-plume::navbar>', '</x-plume::navbar>'],
            'x-plume::navbar-mobile-menu' => ['<x-plume::navbar>', '</x-plume::navbar>'],
            'x-plume::navbar-mobile-toggle' => ['<x-plume::navbar>', '</x-plume::navbar>'],
            'x-plume::tabs-item' => ['<x-plume::tabs default="test"><x-plume::tabs.group>', '</x-plume::tabs.group></x-plume::tabs>'],
            'x-plume::tabs-panel' => ['<x-plume::tabs default="test">', '</x-plume::tabs>'],
            'x-plume::stepper-step' => ['<x-plume::stepper>', '</x-plume::stepper>'],
            'x-plume::table-tr' => ['<x-plume::table>', '</x-plume::table>'],
            'x-plume::table-td' => ['<x-plume::table><x-plume::table.tr>', '</x-plume::table.tr></x-plume::table>'],
            'x-plume::table-th' => ['<x-plume::table><x-plume::table.tr>', '</x-plume::table.tr></x-plume::table>'],
            'x-plume::table-tbody' => ['<x-plume::table>', '</x-plume::table>'],
            'x-plume::table-thead' => ['<x-plume::table>', '</x-plume::table>'],
        ];

        // Construct a simple render string
        $props = '';
        if (isset($meta['props'])) {
            foreach ($meta['props'] as $prop => $details) {
                // If required (no default), provide a dummy value
                if (!isset($details['default']) || $details['default'] === 'null') {
                    if ($prop === 'name') $props .= ' name="test"';
                    if ($prop === 'label') $props .= ' label="Test Label"';
                    if ($prop === 'title') $props .= ' title="Test Title"';
                    if ($prop === 'src') $props .= ' src="http://example.com/test"';
                    if ($prop === 'href') $props .= ' href="#"';
                    if ($prop === 'value') $props .= ' value="test"';
                    if ($prop === 'type') $props .= ' type="text"';
                    if ($prop === 'i') $props .= ' i="icon-[fluent--home-24-regular]"';
                    if ($prop === 'var') $props .= ' var="test_var"';
                    if ($prop === 'step') $props .= ' :step="1"';
                    if ($prop === 'for') $props .= ' for="test"'; // Matches 'test' in tabs wrapper
                    if ($prop === 'text') $props .= ' text="test_text"';
                }
            }
        }

        // For form inputs, add name/model to avoid resolving issues if base component strictness increases
        if (str_contains($name, 'form.')) {
            $props .= ' name="test_input" model="test_model"';
        }

        $wrapper = $wrappers[$name] ?? ['', ''];
        $template = "{$wrapper[0]}<$name $props />{$wrapper[1]}";

        try {
            $view = Blade::render($template);
            expect($view)->toBeString();
        } catch (\Exception $e) {
            $this->fail("Component $name failed to render: " . $e->getMessage());
        }
    }
});
