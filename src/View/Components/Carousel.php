<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Carousel extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public bool $controls = true,
        public bool $indicators = false,
        public bool $autoplay = false,
        public int $interval = 5000,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.carousel', [
            'component' => $this,
        ]);
    }
}