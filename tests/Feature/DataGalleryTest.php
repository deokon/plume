<?php

use Illuminate\Support\Facades\Blade;

test('data gallery renders correctly with static data', function () {
    $data = [
        ['id' => 1, 'name' => 'Product 1', 'price' => 29.99],
        ['id' => 2, 'name' => 'Product 2', 'price' => 39.99],
    ];

    $view = Blade::render('<x-plume::data-gallery :data="$data" />', [
        'data' => $data
    ]);

    expect($view)
        ->toContain('x-data="dataGallery')
        ->toContain('grid')
        ->toContain('gap-4');
});

test('data gallery renders with searchable', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view = Blade::render('<x-plume::data-gallery :data="$data" searchable />', [
        'data' => $data
    ]);

    expect($view)
        ->toContain('search')
        ->toContain('icon-[fluent--search-24-regular]');
});

test('data gallery renders with pagination', function () {
    $data = array_map(fn($i) => ['id' => $i, 'name' => "Item $i"], range(1, 25));

    $view = Blade::render('<x-plume::data-gallery :data="$data" paginated :per-page="10" />', [
        'data' => $data
    ]);

    expect($view)
        ->toContain('x-data="dataGallery')
        ->toContain('pagination')
        ->toContain('results');
});

test('data gallery renders with url for server-side fetching', function () {
    $url = '/api/products';

    $view = Blade::render('<x-plume::data-gallery url="/api/products" paginated />', []);

    expect($view)
        ->toContain('x-data="dataGallery')
        ->toContain('\/api\/products')
        ->toContain('x-show="loading"');
});

test('data gallery supports responsive columns', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view2col = Blade::render('<x-plume::data-gallery :data="$data" cols="2" />', ['data' => $data]);
    expect($view2col)->toContain('grid-cols-1 sm:grid-cols-2');

    $view4col = Blade::render('<x-plume::data-gallery :data="$data" cols="4" />', ['data' => $data]);
    expect($view4col)->toContain('grid-cols-2 sm:grid-cols-3 lg:grid-cols-4');
});

test('data gallery supports minCols and maxCols', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view = Blade::render('<x-plume::data-gallery :data="$data" minCols="2" maxCols="4" />', ['data' => $data]);
    
    expect($view)
        ->toContain('grid-cols-2')
        ->toContain('sm:grid-cols-3')
        ->toContain('lg:grid-cols-4');
});

test('data gallery supports custom gap', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view = Blade::render('<x-plume::data-gallery :data="$data" gap="6" />', ['data' => $data]);

    expect($view)->toContain('gap-6');
});

test('data gallery shows empty state when no results', function () {
    $view = Blade::render('<x-plume::data-gallery :data="$data" />', [
        'data' => []
    ]);

    expect($view)
        ->toContain('x-if="filteredData.length === 0"')
        ->toContain('No items found');
});

test('data gallery renders with slot content', function () {
    $data = [['id' => 1, 'name' => 'Product', 'price' => 29.99]];

    $view = Blade::render(
        '<x-plume::data-gallery :data="$data"><div x-text="item.name"></div></x-plume::data-gallery>',
        ['data' => $data]
    );

    expect($view)
        ->toContain('x-for="(item, index) in pagedData"')
        ->toContain('x-text="item.name"');
});

test('data gallery component accepts all props', function () {
    $data = [['id' => 1, 'name' => 'Item']];
    $url = '/api/products';

    $view = Blade::render(
        '<x-plume::data-gallery :data="$data" :url="$url" cols="4" gap="6" />',
        ['data' => $data, 'url' => $url]
    );

    expect($view)
        ->toContain('grid-cols-2 sm:grid-cols-3 lg:grid-cols-4')
        ->toContain('gap-6')
        ->toContain('x-data="dataGallery');
});

test('data gallery renders with callback props', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view = Blade::render('
        <x-plume::data-gallery 
            :data="$data" 
            on-sort="console.log(\'sorting\')" 
            on-filter="console.log(\'filtering\')"
            on-page-change="console.log(\'paging\')"
            on-load="console.log(\'loading\')"
        />', [
        'data' => $data
    ]);

    expect($view)
        ->toContain('onSort:')
        ->toContain('sorting')
        ->toContain('onFilter:')
        ->toContain('filtering')
        ->toContain('onPageChange:')
        ->toContain('paging')
        ->toContain('onLoad:')
        ->toContain('loading');
});

test('data gallery renders controls slot', function () {
    $data = [['id' => 1, 'name' => 'Item']];

    $view = Blade::render('
        <x-plume::data-gallery :data="$data">
            <x-slot:controls>
                <button id="custom-control">Custom Control</button>
            </x-slot:controls>
        </x-plume::data-gallery>', [
        'data' => $data
    ]);

    expect($view)->toContain('id="custom-control"');
});
