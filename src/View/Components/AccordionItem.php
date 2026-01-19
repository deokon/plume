<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;

class AccordionItem extends Component
{
    use ResolvesId;

    public function __construct(
        public string $title,
        public ?string $id = null,
        public bool $open = false,
    ) {
        $this->id = $this->id ?? $this->uniqueId('accordion');
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.accordion-item');
    }
}