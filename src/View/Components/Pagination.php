<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Pagination extends Component
{
    public int $initialTotal;
    public int $initialCurrent;

    public function __construct(
        public int|string $total = 1,
        public int|string $current = 1,
        public int $onEachSide = 1,
    ) {
        $this->initialTotal = is_numeric($total) ? (int)$total : 1;
        $this->initialCurrent = is_numeric($current) ? (int)$current : 1;
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.pagination');
    }
}
