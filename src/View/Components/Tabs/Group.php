<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Group extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.group');
    }
}
