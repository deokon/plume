<?php

namespace deokon\Plume\View\Components\Search;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Result extends Component
{
    public function __construct(
        public ?string $title = null,
        public string $href = '#',
        public ?string $icon = null,
        public mixed $payload = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.search.result', [
            'component' => $this
        ]);
    }
}
