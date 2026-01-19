<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Section extends Component
{
    public function __construct(
        public string $title,
        public ?string $description = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.section');
    }
}
