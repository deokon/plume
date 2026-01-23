<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Toaster extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $position = 'bottom-right',
    ) {}

    public function render(): View|Closure|string
    {
        $styles = $this->themeStyles();

        return view('plume::components-class.toaster', [
            'component' => $this,
            'component' => $this,
            'positionClasses' => $styles['position'],
            'enterStart' => $styles['enter_start'],
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    protected function themeStyles(): array
    {
        $positions = [
            'top-left' => 'top-0 left-0 items-start',
            'top-center' => 'top-0 left-1/2 -translate-x-1/2 items-center',
            'top-right' => 'top-0 right-0 items-end',
            'bottom-left' => 'bottom-0 left-0 items-start',
            'bottom-center' => 'bottom-0 left-1/2 -translate-x-1/2 items-center',
            'bottom-right' => 'bottom-0 right-0 items-end',
        ];

        $position = $this->position;
        $enterStart = 'translate-y-2 opacity-0';

        if (str_contains($position, 'center')) {
            // Center: keep vertical slide (translate-y-2), no horizontal
        } elseif (str_contains($position, 'left')) {
            $enterStart = '-translate-x-2 opacity-0';
        } else {
            $enterStart = 'translate-x-2 opacity-0';
        }

        return [
            'position' => $positions[$position] ?? $positions['bottom-right'],
            'enter_start' => $enterStart,
        ];
    }
}
