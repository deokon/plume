<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Skeleton extends Component
{
    public function __construct(
        public string $shape = 'rect',
        public string $animation = 'pulse',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.skeleton', [
            'classes' => $this->classes(),
        ]);
    }

    public function classes(): string
    {
        return $this->themeStyles();
    }

    protected function themeStyles(): string
    {
        $shapes = [
            'rect' => 'rounded-md',
            'circle' => 'rounded-full',
            'text' => 'rounded-sm h-[1em] w-full',
        ];

        $animations = [
            'pulse' => 'animate-pulse',
            'wave' => 'animate-wave',
            'none' => '',
        ];

        return implode(' ', [
            'bg-background-700/20 dark:bg-background-400/10 flex items-center justify-center overflow-hidden',
            $shapes[$this->shape] ?? $shapes['rect'],
            $animations[$this->animation] ?? $animations['pulse'],
        ]);
    }
}