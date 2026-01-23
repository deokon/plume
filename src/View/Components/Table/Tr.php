<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Tr extends Component
{
    public function __construct(
        public ?string $rowAlign = null,
        public ?string $align = null, // Support 'align' as well for DX, but map to rowAlign
    ) {
        $this->rowAlign = $align ?? $rowAlign;
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.tr', [
            'component' => $this,
        ]);
    }
}
