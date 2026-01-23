<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class DataTable extends Component
{
    public function __construct(
        public array $data = [],
        public array $columns = [],
        public bool $searchable = false,
        public bool $paginated = false,
        public int $perPage = 10,
        public bool $sortable = true,
        public ?string $url = null,
        public bool $fixedHeight = false,
    ) {}

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