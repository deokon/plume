<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;

class ButtonGroup extends Component
{
    use InteractsWithAttributes;

    public ?string $groupSize;
    public ?string $groupStyle;
    public ?string $groupShape;

    public function __construct(
        public ?string $size = null,
        public bool $stack = true,
        public ?string $style = null,
        public ?string $shape = null,
    ) {
        $this->groupSize = $size;
        $this->groupStyle = $style;
        $this->groupShape = $shape;
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button-group', [
            'component' => $this,
            'groupClasses' => $this->groupClasses(),
        ]);
    }

    public function groupClasses(): string
    {
        $base = 'inline-flex';

        if ($this->stack) {
            $base .= ' -space-x-px';
            // Strip rounding from interior edges
            $base .= ' [&>*:not(:first-child):not(:last-child)]:rounded-none';
            $base .= ' [&>*:first-child:not(:last-child)]:rounded-r-none';
            $base .= ' [&>*:last-child:not(:first-child)]:rounded-l-none';
        } else {
            $base .= ' gap-2';
        }

        return $base;
    }
}
