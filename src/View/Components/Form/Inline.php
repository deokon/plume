<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Inline extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.inline');
    }
}
