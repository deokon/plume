<?php

namespace deokon\Plume\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class PlumeResponse implements Responsable
{
    protected bool $success;
    protected string $message;
    protected mixed $data;
    protected array $errors;
    protected ?string $redirect;
    protected int $status;

    public function __construct(
        bool $success = true,
        string $message = '',
        mixed $data = null,
        array $errors = [],
        ?string $redirect = null,
        int $status = 200
    ) {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
        $this->errors = $errors;
        $this->redirect = $redirect;
        $this->status = $status;
    }

    public static function success(string $message, mixed $data = null, ?string $redirect = null): self
    {
        return new self(true, $message, $data, [], $redirect, 200);
    }

    public static function error(string $message, array $errors = [], int $status = 422): self
    {
        return new self(false, $message, null, $errors, null, $status);
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse([
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
            'errors' => $this->errors,
            'redirect' => $this->redirect,
        ], $this->status);
    }
}
