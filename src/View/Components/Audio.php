<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasMediaSource;

class Audio extends Component
{
    use HasMediaSource;

    public function __construct(
        string $src,
        public bool $autoplay = false,
        public bool $controls = true,
        public bool $loop = false,
        public bool $muted = false,
    ) {
        $this->initializeMediaSource($src);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.audio', [
            'component' => $this
        ]);
    }
}
