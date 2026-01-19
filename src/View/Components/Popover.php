<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Popover extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $trigger = null,
        public string $position = 'bottom',
        public string $align = 'center',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.popover', [
            'component' => $this,
            'contentClasses' => $this->themeStyles(),
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    protected function themeStyles(): string
    {
        $positions = [
            'top' => 'bottom-full mb-2',
            'bottom' => 'top-full mt-2',
            'left' => 'right-full mr-2',
            'right' => 'left-full ml-2',
        ];

        $aligns = [
            'start' => 'left-0',
            'center' => 'left-1/2 -translate-x-1/2',
            'end' => 'right-0',
        ];

        return ($positions[$this->position] ?? $positions['bottom']) . ' ' . 
            ($aligns[$this->align] ?? $aligns['center']);
    }
}