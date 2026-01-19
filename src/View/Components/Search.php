<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Search extends Component
{
    public function __construct(
        public string $placeholder = 'Search...',
        public ?string $model = null,
        public mixed $results = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.search');
    }
}
