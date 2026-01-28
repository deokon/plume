<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasPagination
{
    public array|string $data = [];
    public bool $searchable = false;
    public bool $paginated = false;
    public int $perPage = 10;
    public ?string $url = null;

    protected function initializePagination(
        array|string $data = [],
        bool $searchable = false,
        bool $paginated = false,
        int $perPage = 10,
        ?string $url = null,
    ): void {
        $this->data = $data;
        $this->searchable = $searchable;
        $this->paginated = $paginated;
        $this->perPage = $perPage;
        $this->url = $url;
    }

    protected function preparePaginationData(): array
    {
        return [
            'data' => $this->data,
            'searchable' => $this->searchable,
            'paginated' => $this->paginated,
            'perPage' => $this->perPage,
            'url' => $this->url,
        ];
    }
}
