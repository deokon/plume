<?php

use Illuminate\Support\Facades\Blade;

test('input renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.input label="My Input" name="my_field" />');
    expect($view)->toContain('for="my_field"')->toContain('id="my_field"')->toContain('My Input');
});

test('textarea renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.textarea label="Description" name="desc" />');
    expect($view)->toContain('for="desc"')->toContain('id="desc"')->toContain('Description');
});

test('select renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.select label="Country" name="country"><option>USA</option></x-plume::form.select>');
    expect($view)->toContain('for="country"')->toContain('id="country"')->toContain('Country');
});

test('number input renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.number label="Age" name="age" />');
    expect($view)->toContain('for="age"')->toContain('id="age"')->toContain('Age');
});

test('date input renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.date label="Birthday" name="dob" />');
    expect($view)->toContain('for="dob"')->toContain('id="dob"')->toContain('Birthday');
});

test('password input renders with correct id and label', function () {
    $view = Blade::render('<x-plume::form.password label="Secret" name="pass" />');
    expect($view)->toContain('for="pass"')->toContain('id="pass"')->toContain('Secret');
});
