<?php

namespace deokon\Plume\View\Components\Dropdown;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Separator extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.dropdown.separator', [
            'component' => $this
        ]);
    }
}
