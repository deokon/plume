<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasAlignment;

class Tooltip extends Component
{
    use HasAlignment;

    public function __construct(
        public string $text,
        public string $position = 'top',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tooltip', [
            'component' => $this,
            'positionClasses' => $this->resolvePosition($this->position) . ' ' . $this->resolveAlignment('center', $this->position),
            'arrowClasses' => $this->arrowStyles($this->position),
        ]);
    }

    protected function arrowStyles(string $position): string
    {
        $arrows = [
            'bottom' => 'bottom-full left-1/2 -translate-x-1/2 border-b-background-800 dark:border-b-background-200 border-x-transparent border-t-transparent',
            'left' => 'left-full top-1/2 -translate-y-1/2 border-l-background-800 dark:border-l-background-200 border-y-transparent border-r-transparent',
            'right' => 'right-full top-1/2 -translate-y-1/2 border-r-background-800 dark:border-r-background-200 border-y-transparent border-l-transparent',
            'top' => 'top-full left-1/2 -translate-x-1/2 border-t-background-800 dark:border-t-background-200 border-x-transparent border-b-transparent',
        ];

        return $arrows[$position] ?? $arrows['top'];
    }
}