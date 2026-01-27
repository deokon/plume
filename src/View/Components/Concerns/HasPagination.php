<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasPagination
{
    public array $data = [];
    public bool $searchable = false;
    public bool $paginated = false;
    public int $perPage = 10;
    public ?string $url = null;

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
