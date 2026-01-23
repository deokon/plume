<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Table extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public bool $striped = false,
        public bool $hoverable = false,
        public bool $stickyHeader = false,
        public string $density = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.index', [
            'component' => $this,
            'densityClasses' => $this->getDensityStyles($this->density),
        ]);
    }

    public function getDensityStyles(string $density = 'default'): string
    {
        $map = [
            'tight' => '[&_td]:p-2 [&_th]:p-2',
            'relaxed' => '[&_td]:p-6 [&_th]:p-6',
            'default' => '[&_td]:p-4 [&_th]:p-4',
        ];

        return $this->getClasses($map, $density);
    }
}
