<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\HasPagination;

/**
 * @component x-plume::data-table
 * @description Advanced data table with support for sorting, filtering, and pagination. Powered by AlpineJS. Supports client-side data or server-side fetching via URL.
 * @prop array $data (Default: []) Array of objects to display (client-side data).
 * @prop array $columns (Default: []) Column definitions for the table.
 * @prop bool $searchable (Default: false) Whether to show a search input for filtering.
 * @prop bool $paginated (Default: false) Whether to enable pagination.
 * @prop int $perPage (Default: 10) Number of items per page.
 * @prop bool $sortable (Default: true) Whether to enable column sorting.
 * @prop string $url (Default: null) API endpoint URL for server-side fetching.
 * @prop bool $fixedHeight (Default: false) Whether to give the table a fixed height with sticky header.
 */
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
