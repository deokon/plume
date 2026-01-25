<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Modal extends Component
{
    use InteractsWithAttributes, HasStyles;

    public $header;
    public $footer;

    public function __construct(
        public string $name,
        public bool $show = false,
        public string $maxWidth = '2xl',
        public ?string $title = null,
        public ?string $onOpen = null,
        public ?string $onClose = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.modal', [
            'component' => $this,
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

        return $this->getClasses($widths, $this->maxWidth, '2xl');
    }
}
