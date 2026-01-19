<?php

namespace deokon\Plume\View\Components\Dropdown;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class DropdownItem extends Component
{
    public function __construct(
        public string $style = 'ghost',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.dropdown.item');
    }
}
