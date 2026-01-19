<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Search extends Component
{
    public $results;

    public function __construct(
        public string $placeholder = 'Search...',
        public ?string $model = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.search');
    }
}