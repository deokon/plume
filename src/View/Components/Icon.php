<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Icon extends Component
{
    public function __construct(
        public string $i,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.icon', [
            'component' => $this,'component' => $this]);
    }
}
