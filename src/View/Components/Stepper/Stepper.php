<?php

namespace deokon\Plume\View\Components\Stepper;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Stepper extends Component
{
    public function __construct(
        public int $active = 1,
        public ?string $onStepChange = null,
        public ?string $onFinish = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.stepper.index', [
            'component' => $this
        ]);
    }
}
