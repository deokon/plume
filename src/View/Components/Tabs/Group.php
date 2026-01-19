<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;

class Group extends Component
{
    use InteractsWithAttributes;

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.group', [
            'component' => $this,
        ]);
    }
}