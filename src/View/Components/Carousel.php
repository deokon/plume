<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Carousel extends Component
{
    public function __construct(
        public bool $controls = true,
        public bool $indicators = false,
        public bool $autoplay = false,
        public int $interval = 5000,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.carousel');
    }
}
