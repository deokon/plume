<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasGrid;

class Gallery extends Component
{
    use HasGrid;

    public function __construct(
        public int $cols = 3,
        public int $gap = 4,
        public ?int $minCols = null,
        public ?int $maxCols = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.gallery', [
            'component' => $this,
            'gridClasses' => $this->gridClasses($this->cols, $this->gap, $this->minCols, $this->maxCols),
        ]);
    }
}
