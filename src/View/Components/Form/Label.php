<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Label extends Component
{
    public function __construct(
        public ?string $for = null,
        public bool $required = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.label');
    }
}
