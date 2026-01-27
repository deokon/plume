<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasGrid;

class Group extends Component
{
    use HasGrid;

    public ?string $groupName;
    public ?string $groupModel;

    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public int $minCols = 1,
        ?string $model = null,
        ?string $name = null,
    ) {
        $this->groupName = $name;
        $this->groupModel = $model;
    }

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