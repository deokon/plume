<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasMediaAspectRatio;

class Aspect extends Component
{
    use HasMediaAspectRatio;

    public function __construct(
        public string $ratio = 'video',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.aspect', [
            'component' => $this,
            'ratioClass' => $this->resolveAspectRatio($this->ratio, 'aspect-video'),
        ]);
    }
}
