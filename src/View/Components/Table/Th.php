<?php

namespace deokon\Plume\View\Components\Table;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Th extends Component
{
    public function __construct(
        public string $align = 'left',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.table.th', [
            'alignClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        return match ($this->align) {
            'center' => 'text-center',
            'right' => 'text-right',
            default => 'text-left',
        };
    }
}
