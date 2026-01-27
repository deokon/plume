<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\HasPagination;

class DataGallery extends Component
{
    use HasPagination;

    public function __construct(
        array $data = [],
        bool $searchable = false,
        bool $paginated = false,
        int $perPage = 12,
        ?string $url = null,
        public int $cols = 3,
        public int $gap = 4,
    ) {
        $this->data = $data;
        $this->searchable = $searchable;
        $this->paginated = $paginated;
        $this->perPage = $perPage;
        $this->url = $url;
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
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $gridCols = match ($this->cols) {
            1 => 'grid-cols-1',
            2 => 'grid-cols-1 sm:grid-cols-2',
            3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
            4 => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4',
            default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        };

        return $gridCols . ' gap-' . $this->gap;
    }
}
