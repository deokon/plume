<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Tabs extends Component
{
    use ResolvesId, InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $default = '1',
        public string $side = 'top',
        public string $size = 'md',
        public string $style = 'default',
        public string $shape = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.index', [
            'component' => $this,
            'component' => $this,
            'directionClass' => $this->directionClasses(),
            'groupSize' => $this->size,
            'groupStyle' => $this->style,
            'groupShape' => $this->shape,
            'groupSide' => $this->side,
        ]);
    }

    public function directionClasses(): string
    {
        $map = [
            'top' => 'flex-col',
            'bottom' => 'flex-col-reverse',
            'left' => 'flex-row',
            'right' => 'flex-row-reverse',
        ];

        return $this->getClasses($map, $this->side, 'top');
    }
}