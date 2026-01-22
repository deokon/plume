<?php

namespace deokon\Plume\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Menu extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar.menu');
    }
}