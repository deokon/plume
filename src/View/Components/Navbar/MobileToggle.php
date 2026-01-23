<?php

namespace deokon\Plume\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class MobileToggle extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar.mobile-toggle', [
            'component' => $this,'component' => $this]);
    }
}