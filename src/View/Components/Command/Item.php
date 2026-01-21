<?php

namespace deokon\Plume\View\Components\Command;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Item extends Component
{
    public function __construct(
        public ?string $value = null,
        public ?string $onSelect = null,
        public ?string $icon = null,
        public ?string $shortcut = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command.item');
    }
}