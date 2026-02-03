<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;
use deokon\Plume\View\Components\Concerns\HasAlignment;

class Popover extends Component
{
    use InteractsWithAttributes, HasStyles, HasAlignment;

    public function __construct(
        public ?string $trigger = null,
        public string $position = 'bottom',
        public string $align = 'center',
        public ?string $onOpen = null,
        public ?string $onClose = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.popover', [
            'component' => $this,
            'contentClasses' => $this->resolvePosition($this->position) . ' ' . $this->resolveAlignment($this->align, $this->position),
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }
}
