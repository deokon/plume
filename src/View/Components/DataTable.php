<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\HasPagination;

class DataTable extends Component
{
    use HasPagination;

    public function __construct(
        array $data = [],
        public array $columns = [],
        bool $searchable = false,
        bool $paginated = false,
        int $perPage = 10,
        public bool $sortable = true,
        ?string $url = null,
        public bool $fixedHeight = false,
    ) {
        $this->initializePagination($data, $searchable, $paginated, $perPage, $url);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.data-table', [
            'component' => $this,
            'data' => $this->data,
            'columns' => $this->columns,
            'searchable' => $this->searchable,
            'paginated' => $this->paginated,
            'perPage' => $this->perPage,
            'sortable' => $this->sortable,
            'url' => $this->url,
            'fixedHeight' => $this->fixedHeight,
        ]);
    }
}
