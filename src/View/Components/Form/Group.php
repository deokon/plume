<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasGrid;

class Group extends Component
{
    use HasGrid;

    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public int $minCols = 1,
        public ?string $model = null,
        public ?string $name = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.group', [
            'component' => $this,
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        return $this->gridClasses($this->minCols, 4, $this->minCols);
    }
}