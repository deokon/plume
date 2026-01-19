<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Pagination extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public int $total = 1,
        public int $current = 1,
        public int $onEachSide = 1,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.pagination', [
            'component' => $this,
            'initialTotal' => $this->total,
            'initialCurrent' => $this->current,
        ]);
    }
}
