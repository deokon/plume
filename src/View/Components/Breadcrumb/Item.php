<?php

namespace deokon\Plume\View\Components\Breadcrumb;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Item extends Component
{
    public function __construct(
        public ?string $href = null,
        public bool $active = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.breadcrumb.item', [
            'component' => $this
        ]);
    }
}
