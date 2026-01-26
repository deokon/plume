<?php

use Illuminate\Support\Facades\Blade;

test('button renders correctly', function () {
    $view = Blade::render('<x-plume::button style="outline">Click Me</x-plume::button>');
    expect($view)->toContain('border bg-none')->toContain('Click Me');
});

test('button renders with confirmation', function () {
    $view = Blade::render('<x-plume::button confirm="Are you sure?">Delete</x-plume::button>');
    expect($view)
        ->toContain('if (!confirm(&#039;Are you sure?&#039;))')
        ->toContain('Delete');
});

test('button renders with method using ajax form', function () {
    $view = Blade::render('<x-plume::button method="DELETE" href="/delete" onSuccess="done()">Delete</x-plume::button>');
    
    expect($view)
        ->toContain('x-data="form(')
        ->toContain('onSuccess')
        ->toContain('done()')
        ->toContain('action="/delete"')
        ->toContain('method="POST"') // Laravel spoofing
        ->toContain('name="_method" value="DELETE"');
});

test('alert renders correctly', function () {
    $view = Blade::render('<x-plume::alert style="success" title="Success!">Done</x-plume::alert>');
    expect($view)->toContain('bg-primary-100')->toContain('Success!')->toContain('Done');
});

test('badge renders correctly', function () {
    $view = Blade::render('<x-plume::badge style="secondary">New</x-plume::badge>');
    expect($view)->toContain('bg-secondary-200')->toContain('New');
});

test('avatar renders correctly', function () {
    $view = Blade::render('<x-plume::avatar size="sm" fallback="JD" status="online" />');
    expect($view)->toContain('size-6 text-[10px]')->toContain('JD')->toContain('bg-primary');
});

test('spinner renders correctly', function () {
    $view = Blade::render('<x-plume::spinner size="lg" style="error" />');
    expect($view)->toContain('size-8')->toContain('text-error');
});
