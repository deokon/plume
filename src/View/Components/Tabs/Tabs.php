<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Tabs extends Component
{
    public function __construct(
        public string $default = '1',
        public string $side = 'top',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.index', [
            'directionClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $directions = [
            'left' => 'flex-row',
            'right' => 'flex-row-reverse',
            'top' => 'flex-col',
            'bottom' => 'flex-col-reverse',
        ];

        return $directions[$this->side] ?? 'flex-col';
    }
}
