<?php

use Illuminate\Support\Facades\Blade;

test('pagination renders correctly with dynamic attributes', function () {
    $view = Blade::render('<x-plume::pagination :total="5" :current="1" />');
    expect($view)->toContain('x-data="pagination(5, 1, 1, \'\')"')
        ->toContain('data-total="5"')
        ->toContain('data-current="1"');
});

test('data table renders correctly with dynamic attributes', function () {
    $data = [['id' => 1, 'name' => 'John']];
    $cols = [['key' => 'id', 'label' => 'ID']];
    
    $view = Blade::render('<x-plume::data-table :data="$data" :columns="$cols" paginated per-page="5" />', [
        'data' => $data,
        'cols' => $cols,
    ]);
    
    expect($view)->toContain('x-data="dataTable(5, true, true, null,')
        ->toContain('x-text="col.label"')
        ->toContain('x-text="row[col.key]"');
});

test('command renders correctly with slots', function () {
    $template = <<<'BLADE'
<x-plume::command>
    <x-slot:trigger>
        <button>Open</button>
    </x-slot:trigger>
    <x-plume::command.group title="Suggestions">
        <x-plume::command.item>Item 1</x-plume::command.item>
    </x-plume::command.group>
</x-plume::command>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('x-data="command(\'\')"')
        ->toContain('Open')
        ->toContain('Suggestions')
        ->toContain('Item 1');
});

test('search renders correctly with results slot', function () {
    $template = <<<'BLADE'
<x-plume::search placeholder="Search...">
    <x-slot:results>
        <x-plume::search.result title="Result 1" />
    </x-slot:results>
</x-plume::search>
BLADE;

    $view = Blade::render($template);
    
    expect($view)
        ->toContain('placeholder="Search..."')
        ->toContain('Result 1');
});
