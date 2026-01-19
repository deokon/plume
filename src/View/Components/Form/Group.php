<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Group extends Component
{
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public int $minCols = 1,
        public ?string $name = null,
        public ?string $model = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.group', [
            'gridClasses' => $this->themeStyles(),
            'name' => $this->name,
            'model' => $this->model,
        ]);
    }

    protected function themeStyles(): string
    {
        return "grid grid-cols-{$this->minCols} gap-4";
    }
}
