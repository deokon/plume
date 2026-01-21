<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;

test('all documented components render without errors', function () {
    $json = File::get(__DIR__ . '/../../plume-api.json');
    $api = json_decode($json, true);
    
    foreach ($api['components'] as $name => $meta) {
        // Skip components that require specific complex context or slots to render validly
        // without mocking, or handle them specifically.
        $skipped = [
            'x-plume::accordion-item', 
            'x-plume::breadcrumb-item',
            'x-plume::carousel-item',
            'x-plume::command-item',
            'x-plume::dropdown-item',
            'x-plume::navbar-item',
            'x-plume::navbar-mobile-item',
            'x-plume::tabs-item',
            'x-plume::tabs-panel',
            'x-plume::stepper-step',
            'x-plume::table-tr',
            'x-plume::table-td',
            'x-plume::table-th',
            'x-plume::table-tbody',
            'x-plume::table-thead',
        ];

        if (in_array($name, $skipped)) {
            continue;
        }

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
                    if ($prop === 'for') $props .= ' for="test_for"';
                    if ($prop === 'text') $props .= ' text="test_text"';
                }
            }
        }

        // For form inputs, add name/model to avoid resolving issues if base component strictness increases
        if (str_contains($name, 'form.')) {
            $props .= ' name="test_input" model="test_model"';
        }

        try {
            $view = Blade::render("<$name $props />");
            expect($view)->toBeString();
        } catch (\Exception $e) {
            $this->fail("Component $name failed to render: " . $e->getMessage());
        }
    }
});
