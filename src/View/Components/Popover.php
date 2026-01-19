<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Popover extends Component
{
    public function __construct(
        public ?string $trigger = null,
        public string $position = 'bottom',
        public string $align = 'center',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.popover');
    }
}
