<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasGrid;

class Section extends Component
{
    use HasGrid;

    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public int $minCols = 1,
        public ?int $maxCols = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.section', [
            'component' => $this,
            'gridClasses' => $this->gridClasses(1, 6, $this->minCols, $this->maxCols),
        ]);
    }
}
