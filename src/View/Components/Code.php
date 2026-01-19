<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Code extends Component
{
    public function __construct(
        public ?string $language = null,
        public ?string $title = null,
        public ?string $code = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.code');
    }
}
