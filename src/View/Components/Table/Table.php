<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Table extends Component
{
    public function __construct(
        public bool $striped = false,
        public bool $hoverable = false,
        public bool $stickyHeader = false,
        public string $density = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.index', [
            'densityClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $densities = [
            'compact' => '[&_td]:p-2 [&_th]:h-8 [&_th]:px-2',
            'loose' => '[&_td]:p-6 [&_th]:h-16 [&_th]:px-6',
            'default' => '[&_td]:p-4 [&_th]:h-12 [&_th]:px-4',
        ];

        return $densities[$this->density] ?? $densities['default'];
    }
}
