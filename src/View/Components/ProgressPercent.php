<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class ProgressPercent extends Component
{
    public function __construct(
        public int $value = 0,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.progress-percent');
    }
}