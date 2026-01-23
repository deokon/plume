<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;

class Td extends Component
{
    use InteractsWithAttributes;

    public function __construct(
        public ?string $align = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.td', [
            'component' => $this,
            'component' => $this,
        ]);
    }
}
