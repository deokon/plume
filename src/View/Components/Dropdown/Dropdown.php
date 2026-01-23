<?php

namespace deokon\Plume\View\Components\Dropdown;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\Theme;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Dropdown extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $trigger = null,
        public string $align = 'right',
        public string $width = 'md',
        public string $contentClasses = 'bg-background dark:bg-background-800',
        public string $triggerStyle = 'outline',
    ) {}

    public function render(): View|Closure|string
    {
        $theme = Theme::dropdown($this->align, $this->width);

        return view('plume::components-class.dropdown.index', [
            'component' => $this,
            'alignmentClasses' => $theme['align'],
            'widthClass' => $theme['width'],
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }
}
