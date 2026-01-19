<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class BreadcrumbItem extends Component
{
    public function __construct(
        public ?string $href = null,
        public bool $active = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.breadcrumb-item');
    }
}
