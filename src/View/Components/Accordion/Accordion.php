<?php

namespace deokon\Plume\View\Components\Accordion;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Accordion extends Component
{
    public function __construct(
        public bool $alwaysOpen = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.accordion.index', [
            'component' => $this,'component' => $this]);
    }
}