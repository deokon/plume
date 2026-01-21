<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Group extends Component
{
    public ?string $groupName;
    public ?string $groupModel;

    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public int $minCols = 1,
        public ?string $name = null,
        public ?string $model = null,
    ) {
        $this->groupName = $name;
        $this->groupModel = $model;
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.group', [
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $cols = [
            1 => 'grid-cols-1',
            2 => 'grid-cols-2',
            3 => 'grid-cols-3',
            4 => 'grid-cols-4',
            5 => 'grid-cols-5',
            6 => 'grid-cols-6',
            12 => 'grid-cols-12',
        ];

        $colClass = $cols[$this->minCols] ?? 'grid-cols-1';

        return "grid {$colClass} gap-4";
    }
}