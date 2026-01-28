<?php

namespace deokon\Plume\View\Components\Command;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasIcon;

class Item extends Component
{
    use HasIcon;

    public function __construct(
        public ?string $value = null,
        public ?string $onSelect = null,
        ?string $icon = null,
        public ?string $shortcut = null,
    ) {
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command.item', [
            'component' => $this
        ]);
    }
}
