<?php

namespace deokon\Plume\View\Components\Search;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasIcon;

class Result extends Component
{
    use HasIcon;

    public function __construct(
        public ?string $title = null,
        public string $href = '#',
        ?string $icon = null,
        public mixed $payload = null,
    ) {
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.search.result', [
            'component' => $this
        ]);
    }
}
