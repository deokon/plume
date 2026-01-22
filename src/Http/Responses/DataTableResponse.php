<?php

namespace deokon\Plume\Http\Responses;

use Illuminate\Pagination\LengthAwarePaginator;

class DataTableResponse extends PlumeResponse
{
    public function __construct(
        mixed $data,
        int $total = 0,
        int $currentPage = 1,
        int $perPage = 10,
        string $message = '',
        bool $success = true,
        int $status = 200
    ) {
        $pagination = [
            'total' => $total,
            'current_page' => $currentPage,
            'per_page' => $perPage,
            'last_page' => (int) ceil($total / $perPage),
        ];

        parent::__construct(
            success: $success,
            message: $message,
            data: [
                'items' => $data,
                'pagination' => $pagination,
            ],
            status: $status
        );
    }

    /**
     * Create a DataTableResponse from a Laravel Paginator.
     */
    public static function fromPaginator(LengthAwarePaginator $paginator, string $message = ''): self
    {
        return new self(
            data: $paginator->items(),
            total: $paginator->total(),
            currentPage: $paginator->currentPage(),
            perPage: $paginator->perPage(),
            message: $message
        );
    }
}
