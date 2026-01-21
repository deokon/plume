<?php

namespace deokon\Plume\View\Components\Carousel;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Item extends Component
{
    public function render(): View|Closure|string
    {
        return view('plume::components-class.carousel.item');
    }
}