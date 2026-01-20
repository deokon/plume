<?php

use deokon\Plume\Http\Responses\PlumeResponse;
use Illuminate\Http\JsonResponse;

test('it creates a success response', function () {
    $response = PlumeResponse::success('Great job', ['id' => 1]);
    $json = $response->toResponse(request());
    
    expect($json)->toBeInstanceOf(JsonResponse::class)
        ->and($json->getData(true))->toMatchArray([
            'success' => true,
            'message' => 'Great job',
            'data' => ['id' => 1],
            'errors' => [],
        ]);
});

test('it creates an error response', function () {
    $response = PlumeResponse::error('Oops', ['field' => ['Required']]);
    $json = $response->toResponse(request());
    
    expect($json->status())->toBe(422)
        ->and($json->getData(true))->toMatchArray([
            'success' => false,
            'message' => 'Oops',
            'errors' => ['field' => ['Required']],
        ]);
});
