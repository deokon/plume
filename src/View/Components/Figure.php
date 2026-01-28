<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasMediaAspectRatio;

class Figure extends Component
{
    use HasMediaAspectRatio;

    public $sources;

    public function __construct(
        public string $src,
        public string $alt = '',
        public ?string $caption = null,
        public ?string $aspect = null,
        public ?string $srcset = null,
        public ?string $sizes = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.figure', [
            'component' => $this,
            'aspectClass' => $this->resolveAspectRatio($this->aspect),
        ]);
    }
}
