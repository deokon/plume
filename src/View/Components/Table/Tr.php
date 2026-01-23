<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Tr extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.tr', [
            'component' => $this,'component' => $this]);
    }
}
