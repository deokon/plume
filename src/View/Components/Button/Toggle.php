<?php

namespace deokon\Plume\View\Components\Button;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Toggle extends Component
{
    public function __construct(
        public string $var,
        public string $size = 'md',
        public ?string $style = null,
        public ?string $offStyle = null,
        public ?string $on = null,
        public ?string $off = null,
        public ?string $click = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button.toggle', [
            'component' => $this
        ]);
    }
}
