<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\HasPagination;
use deokon\Plume\View\Components\Concerns\HasGrid;

class DataGallery extends Component
{
    use HasPagination, HasGrid;

    public function __construct(
        array|string $data = [],
        bool $searchable = false,
        bool $paginated = false,
        int $perPage = 10,
        ?string $url = null,
        public int $cols = 3,
        public int $gap = 4,
        public ?int $minCols = null,
        public ?int $maxCols = null,
    ) {
        $this->initializePagination($data, $searchable, $paginated, $perPage, $url);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.data-gallery', [
            'component' => $this,
            'data' => $this->data,
            'searchable' => $this->searchable,
            'paginated' => $this->paginated,
            'perPage' => $this->perPage,
            'url' => $this->url,
            'gridClasses' => $this->gridClasses($this->cols, $this->gap, $this->minCols, $this->maxCols),
        ]);
    }
}
