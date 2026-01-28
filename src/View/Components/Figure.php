<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasMediaAspectRatio;
use deokon\Plume\View\Components\Concerns\HasMediaSource;

class Figure extends Component
{
    use HasMediaAspectRatio, HasMediaSource;

    public $sources;

    public function __construct(
        string $src,
        string $alt = '',
        public ?string $caption = null,
        public ?string $aspect = null,
        public ?string $srcset = null,
        public ?string $sizes = null,
    ) {
        $this->initializeMediaSource($src, $alt);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.figure', [
            'component' => $this,
            'aspectClass' => $this->resolveAspectRatio($this->aspect),
        ]);
    }
}
