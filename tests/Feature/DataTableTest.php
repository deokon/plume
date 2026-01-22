<?php

use Illuminate\Support\Facades\Blade;
use deokon\Plume\Http\Responses\DataTableResponse;
use Illuminate\Pagination\LengthAwarePaginator;

test('data table renders correctly with static data', function () {
    $data = [['name' => 'John', 'age' => 30]];
    $columns = [['key' => 'name', 'label' => 'Name'], ['key' => 'age', 'label' => 'Age']];

    $view = Blade::render('<x-plume::data-table :data="$data" :columns="$columns" />', [
        'data' => $data,
        'columns' => $columns
    ]);

    expect($view)
        ->toContain('x-data="dataTable')
        ->toContain('Name')
        ->toContain('Age');
});

test('data table renders with url for server-side fetching', function () {
    $columns = [['key' => 'name', 'label' => 'Name']];
    $url = '/api/users';

    $view = Blade::render('<x-plume::data-table url="/api/users" :columns="$columns" />', [
        'columns' => $columns
    ]);

    expect($view)
        ->toContain('x-data="dataTable')
        ->toContain('\/api\/users')
        ->toContain('x-show="loading"');
});

test('DataTableResponse returns correct structure', function () {
    $data = [['id' => 1, 'name' => 'Test']];
    $response = new DataTableResponse($data, 100, 1, 10);
    $json = $response->toResponse(request())->getData(true);

    expect($json['success'])->toBeTrue();
    expect($json['data']['items'])->toBe($data);
    expect($json['data']['pagination']['total'])->toBe(100);
    expect($json['data']['pagination']['current_page'])->toBe(1);
    expect($json['data']['pagination']['last_page'])->toBe(10);
});

test('DataTableResponse can be created from paginator', function () {
    $items = collect([['id' => 1]]);
    $paginator = new LengthAwarePaginator($items, 1, 10, 1);

    $response = DataTableResponse::fromPaginator($paginator);
    $json = $response->toResponse(request())->getData(true);

    expect($json['data']['items'])->toBe($items->toArray());
    expect($json['data']['pagination']['total'])->toBe(1);
});
