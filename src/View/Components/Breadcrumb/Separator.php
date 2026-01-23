<?php

namespace deokon\Plume\View\Components\Breadcrumb;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Separator extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.breadcrumb.separator', [
            'component' => $this
        ]);
    }
}
