<?php

namespace deokon\Plume\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Logo extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar.logo');
    }
}