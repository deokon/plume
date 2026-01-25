<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Drawer extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $name,
        public bool $show = false,
        public string $side = 'right',
        public ?string $title = null,
        public ?string $description = null,
        public ?string $onOpen = null,
        public ?string $onClose = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.drawer', [
            'component' => $this,
            'sideClasses' => $this->sideClasses(),
            'transitionAttributes' => $this->transitionAttributes(),
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    protected function themeStyles(): array
    {
        $classes = [
            'left' => 'left-0 h-full w-full max-w-sm border-r',
            'top' => 'top-0 w-full h-auto max-h-[80vh] border-b',
            'bottom' => 'bottom-0 w-full h-auto max-h-[80vh] border-t',
            'right' => 'right-0 h-full w-full max-w-sm border-l',
        ];

        $transitions = [
            'left' => 'x-transition:enter-start="-translate-x-full" x-transition:leave-end="-translate-x-full"',
            'top' => 'x-transition:enter-start="-translate-y-full" x-transition:leave-end="-translate-y-full"',
            'bottom' => 'x-transition:enter-start="translate-y-full" x-transition:leave-end="translate-y-full"',
            'right' => 'x-transition:enter-start="translate-x-full" x-transition:leave-end="translate-x-full"',
        ];

        return [
            'classes' => $classes[$this->side] ?? $classes['right'],
            'transition' => $transitions[$this->side] ?? $transitions['right'],
        ];
    }

    public function sideClasses(): string
    {
        return $this->themeStyles()['classes'];
    }

    public function transitionAttributes(): string
    {
        return $this->themeStyles()['transition'];
    }
}
