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

    public string $groupSize;
    public string $groupStyle;
    public string $groupShape;
    public string $groupSide;

    public function __construct(
        public string $default = '1',
        public ?string $model = null,
        public string $side = 'top',
        public string $size = 'md',
        public string $style = 'default',
        public string $shape = 'default',
        public ?string $onTabChange = null,
    ) {
        $this->groupSize = $size;
        $this->groupStyle = $style;
        $this->groupShape = $shape;
        $this->groupSide = $side;
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.index', [
            'component' => $this,
            'directionClass' => $this->directionClasses(),
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
