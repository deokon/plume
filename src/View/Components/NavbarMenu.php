<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class NavbarMenu extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar-menu');
    }
}
