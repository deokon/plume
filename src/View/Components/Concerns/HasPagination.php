<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasPagination
{
    public array|string $data = [];
    public bool $searchable = false;
    public bool $paginated = false;
    public int $perPage = 10;
    public ?string $url = null;
    public ?string $onSort = null;
    public ?string $onFilter = null;
    public ?string $onPageChange = null;
    public ?string $onLoad = null;

    protected function initializePagination(
        array|string $data = [],
        bool $searchable = false,
        bool $paginated = false,
        int $perPage = 10,
        ?string $url = null,
        ?string $onSort = null,
        ?string $onFilter = null,
        ?string $onPageChange = null,
        ?string $onLoad = null,
    ): void {
        $this->data = $data;
        $this->searchable = $searchable;
        $this->paginated = $paginated;
        $this->perPage = $perPage;
        $this->url = $url;
        $this->onSort = $onSort;
        $this->onFilter = $onFilter;
        $this->onPageChange = $onPageChange;
        $this->onLoad = $onLoad;
    }

    protected function preparePaginationData(): array
    {
        return [
            'data' => $this->data,
            'searchable' => $this->searchable,
            'paginated' => $this->paginated,
            'perPage' => $this->perPage,
            'url' => $this->url,
            'onSort' => $this->onSort,
            'onFilter' => $this->onFilter,
            'onPageChange' => $this->onPageChange,
            'onLoad' => $this->onLoad,
        ];
    }
}
