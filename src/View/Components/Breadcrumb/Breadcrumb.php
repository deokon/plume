<?php

namespace deokon\Plume\View\Components\Breadcrumb;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Breadcrumb extends Component
{
    public function __construct(
        public array $items = [],
        public string $separator = 'icon-[fluent--chevron-right-24-regular]',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.breadcrumb.index', [
            'component' => $this,'component' => $this]);
    }
}