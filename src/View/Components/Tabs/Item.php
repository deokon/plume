<?php

namespace deokon\Plume\View\Components\Tabs;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Item extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $for,
        public ?string $size = null,
        public ?string $style = null,
        public ?string $shape = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.tabs.item', [
            'component' => $this,
        ]);
    }
}
