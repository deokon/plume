<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class SearchResult extends Component
{
    public function __construct(
        public string $title,
        public ?string $href = '#',
        public ?string $icon = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.search-result');
    }
}
