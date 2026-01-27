<?php

namespace deokon\Plume\View\Components\Navbar;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasLink;

class Item extends Component
{
    use HasLink;

    public function __construct(
        bool $active = false,
        string $href = '#',
    ) {
        $this->initializeLink($href, $active);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.navbar.item', [
            'component' => $this
        ]);
    }
}
