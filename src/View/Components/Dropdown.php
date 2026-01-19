<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Dropdown extends Component
{
    public function __construct(
        public ?string $trigger = null,
        public string $align = 'right',
        public string $width = 'md',
        public string $contentClasses = 'bg-background dark:bg-background-800',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.dropdown', [
            'alignmentClasses' => $this->alignmentClasses(),
            'widthClass' => $this->widthClass(),
        ]);
    }

    protected function themeStyles(): array
    {
        $alignments = [
            'left' => 'origin-top-left left-0',
            'top' => 'origin-top',
            'right' => 'origin-top-right right-0',
        ];

        $widths = [
            'xs' => 'w-32',
            'sm' => 'w-48',
            'md' => 'w-56',
            'lg' => 'w-64',
            'xl' => 'w-80',
        ];

        return [
            'align' => $alignments[$this->align] ?? $alignments['right'],
            'width' => $widths[$this->width] ?? $this->width,
        ];
    }

    public function alignmentClasses(): string
    {
        return $this->themeStyles()['align'];
    }

    public function widthClass(): string
    {
        return $this->themeStyles()['width'];
    }
}
