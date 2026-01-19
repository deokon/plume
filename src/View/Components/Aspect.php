<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Aspect extends Component
{
    public function __construct(
        public string $ratio = 'video',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.aspect', [
            'ratioClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        return match ($this->ratio) {
            'square' => 'aspect-square',
            'video' => 'aspect-video',
            '4/3' => 'aspect-[4/3]',
            '3/2' => 'aspect-[3/2]',
            '21/9' => 'aspect-[21/9]',
            '1/1' => 'aspect-square',
            default => str_starts_with($this->ratio, 'aspect-') ? $this->ratio : 'aspect-[' . $this->ratio . ']',
        };
    }
}
