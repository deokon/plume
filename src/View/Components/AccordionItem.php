<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use Illuminate\Support\Str;

class AccordionItem extends Component
{
    public string $id;

    public function __construct(
        public string $title,
        ?string $id = null,
        public bool $open = false,
    ) {
        $this->id = $id ?? Str::random(8);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.accordion-item');
    }
}
