<?php

namespace deokon\Plume\View\Components\Carousel;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Carousel extends Component
{
    public function __construct(
        public bool $autoplay = false,
        public int $interval = 3000,
        public bool $controls = true,
        public bool $indicators = true,
        public ?string $model = null,
        public ?string $onSlideChange = '',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.carousel.index', [
            'component' => $this
        ]);
    }
}
