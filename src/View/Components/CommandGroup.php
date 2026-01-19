<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class CommandGroup extends Component
{
    public function __construct(
        public string $heading,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command-group');
    }
}
