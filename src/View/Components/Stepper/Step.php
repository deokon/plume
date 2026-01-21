<?php

namespace deokon\Plume\View\Components\Stepper;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Step extends Component
{
    public function __construct(
        public ?int $step = null,
        public ?string $title = null,
        public ?string $description = null,
        public mixed $prev = null,
        public mixed $next = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.stepper.step');
    }
}