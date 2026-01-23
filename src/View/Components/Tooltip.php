<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Tooltip extends Component
{
    public function __construct(
        public string $text,
        public string $position = 'top',
    ) {}

    public function render(): View|Closure|string
    {
        $styles = $this->themeStyles();

        return view('plume::components-class.tooltip', [
            'component' => $this,
            'positionClasses' => $styles['position'],
            'arrowClasses' => $styles['arrow'],
        ]);
    }

    protected function themeStyles(): array
    {
        $positions = [
            'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
            'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
            'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
            'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        ];

        $arrows = [
            'bottom' => 'bottom-full left-1/2 -translate-x-1/2 border-b-background-800 dark:border-b-background-200 border-x-transparent border-t-transparent',
            'left' => 'left-full top-1/2 -translate-y-1/2 border-l-background-800 dark:border-l-background-200 border-y-transparent border-r-transparent',
            'right' => 'right-full top-1/2 -translate-y-1/2 border-r-background-800 dark:border-r-background-200 border-y-transparent border-l-transparent',
            'top' => 'top-full left-1/2 -translate-x-1/2 border-t-background-800 dark:border-t-background-200 border-x-transparent border-b-transparent',
        ];

        return [
            'position' => $positions[$this->position] ?? $positions['top'],
            'arrow' => $arrows[$this->position] ?? $arrows['top'],
        ];
    }
}