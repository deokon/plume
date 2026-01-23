<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Divider extends Component
{
    public function __construct(
        public ?string $label = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.divider', [
            'component' => $this,'component' => $this]);
    }
}
