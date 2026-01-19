<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Audio extends Component
{
    public function __construct(
        public string $src,
        public bool $autoplay = false,
        public bool $controls = true,
        public bool $loop = false,
        public bool $muted = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.audio');
    }
}
