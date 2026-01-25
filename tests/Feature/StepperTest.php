<?php

use Illuminate\Support\Facades\Blade;

test('stepper renders correctly with steps', function () {
    $template = <<<'BLADE'
<x-plume::stepper :active="2">
    <x-plume::stepper.step :step="1" title="Step 1">Content 1</x-plume::stepper.step>
    <x-plume::stepper.step :step="2" title="Step 2">Content 2</x-plume::stepper.step>
</x-plume::stepper>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('x-data="stepper(2, { onStepChange: null, onFinish: null })"')
        ->toContain('Step 1')
        ->toContain('Content 1')
        ->toContain('Step 2')
        ->toContain('Content 2');
});

test('stepper actions update active state', function () {
    $template = <<<'BLADE'
<x-plume::stepper :active="1">
    <x-plume::stepper.step :step="1" title="Step 1">
        <x-slot:actions>
            <x-plume::stepper.actions next />
        </x-slot:actions>
    </x-plume::stepper.step>
</x-plume::stepper>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('@click="active = active + 1"')
        ->toContain('Next');
});
