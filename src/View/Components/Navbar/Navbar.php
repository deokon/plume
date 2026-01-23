<?php

namespace deokon\Plume\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Navbar extends Component
{
    public function __construct(
        public bool $sticky = false,
        public string $mobileIcon = 'icon-[fluent--line-horizontal-3-20-regular]',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar.index', [
            'component' => $this,'component' => $this]);
    }
}
