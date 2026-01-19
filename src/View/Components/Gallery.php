<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Gallery extends Component
{
    public function __construct(
        public int $cols = 3,
        public int $gap = 4,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.gallery', [
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
