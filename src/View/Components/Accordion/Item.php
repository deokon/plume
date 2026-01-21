<?php

namespace deokon\Plume\View\Components\Accordion;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Item extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $id = null,
        public bool $open = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.accordion.item');
    }
}
