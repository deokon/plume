<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Modal extends Component
{
    public $header;
    public $footer;

    public function __construct(
        public string $name,
        public bool $show = false,
        public string $maxWidth = '2xl',
        public ?string $title = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.modal', [
            'maxWidthClass' => $this->themeStyles(),
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    protected function themeStyles(): string
    {
        $widths = [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
        ];

        return $widths[$this->maxWidth] ?? $widths['2xl'];
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
