<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Group extends Component
{
    public function __construct(
        public ?string $title = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.group');
    }
}
