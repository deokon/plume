<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Thead extends Component
{
    public function __construct(
        public bool $sticky = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.thead', [
            'component' => $this,'component' => $this]);
    }
}
