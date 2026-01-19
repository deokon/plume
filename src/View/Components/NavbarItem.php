<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class NavbarItem extends Component
{
    public function __construct(
        public bool $active = false,
        public string $href = '#',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar-item');
    }
}
