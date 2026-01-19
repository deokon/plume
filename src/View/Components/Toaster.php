<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Toaster extends Component
{
    public function __construct(
        public string $position = 'bottom-right',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.toaster', [
            'positionClasses' => $this->positionClasses(),
            'enterStart' => $this->enterStart(),
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    public function positionClasses(): string
    {
        return match ($this->position) {
            'top-left' => 'top-0 left-0 items-start',
            'top-center' => 'top-0 left-1/2 -translate-x-1/2 items-center',
            'top-right' => 'top-0 right-0 items-end',
            'bottom-left' => 'bottom-0 left-0 items-start',
            'bottom-center' => 'bottom-0 left-1/2 -translate-x-1/2 items-center',
            'bottom-right' => 'bottom-0 right-0 items-end',
            default => 'bottom-0 right-0 items-end',
        };
    }

    public function enterStart(): string
    {
        $enterStart = 'translate-y-2 opacity-0';
        if (str_contains($this->position, 'center')) {
            // Center: keep vertical slide (translate-y-2), no horizontal
        } elseif (str_contains($this->position, 'right')) {
            // Right: Reset Y, slide from right
            $enterStart .= ' sm:translate-y-0 sm:translate-x-2';
        } else {
            // Left: Reset Y, slide from left
            $enterStart .= ' sm:translate-y-0 sm:-translate-x-2';
        }
        return $enterStart;
    }

    protected function transitions(string $type = 'default'): string
    {
        $durations = [
            'fast' => 'duration-150',
            'default' => 'duration-300',
            'slow' => 'duration-500',
            'overlay-enter' => 'ease-out duration-300',
            'overlay-leave' => 'ease-in duration-200',
        ];

        return $durations[$type] ?? $durations['default'];
    }
}
