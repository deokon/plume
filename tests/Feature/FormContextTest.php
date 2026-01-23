<?php

use Illuminate\Support\Facades\Blade;

test('form components inherit name and model from group', function () {
    $template = <<<'BLADE'
<x-plume::form.group name="user" model="form.user">
    <x-plume::form.input name="first_name" label="First Name" />
    <x-plume::form.input name="last_name" label="Last Name" />
</x-plume::form.group>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('name="user[first_name]"')
        ->toContain('x-model="form.user.first_name"')
        ->toContain('name="user[last_name]"')
        ->toContain('x-model="form.user.last_name"');
});

test('form components can override inherited group attributes', function () {
    $template = <<<'BLADE'
<x-plume::form.group name="user" model="form.user">
    <x-plume::form.input name="email" label="Email" />
    <x-plume::form.input name="other" model="other_field" label="Other" />
</x-plume::form.group>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('name="user[email]"')
        ->toContain('x-model="form.user.email"')
        ->toContain('x-model="data.other_field"');
});
