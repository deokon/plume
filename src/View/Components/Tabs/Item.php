<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Item extends Component
{
    public function __construct(
        public string $for,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.item');
    }
}
