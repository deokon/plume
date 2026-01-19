<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class StepperActions extends Component
{
    public function __construct(
        public mixed $prev = null,
        public mixed $next = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.stepper-actions');
    }
}
