<?php

use deokon\Plume\Form;

test('it resolves id from name if id is null', function () {
    $id = Form::resolveId('User Name', null, null);
    expect($id)->toBe('user_name');
});

test('it resolves id from model if name and id are null', function () {
    $id = Form::resolveId(null, 'email_address', null);
    expect($id)->toBe('email_address');
});

test('it uses provided id if not null', function () {
    $id = Form::resolveId('name', 'model', 'custom-id');
    expect($id)->toBe('custom-id');
});

test('it generates correct input classes with icons', function () {
    $classes = Form::inputClasses('icon-name', false);
    expect($classes)->toContain('pl-10')->not->toContain('pr-10');
});

test('it generates correct input classes with right side content', function () {
    $classes = Form::inputClasses(null, true);
    expect($classes)->toContain('pr-10')->not->toContain('pl-10');
});
