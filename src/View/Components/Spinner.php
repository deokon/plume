<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\Theme;

class Spinner extends Component
{
    public function __construct(
        public string $size = 'md',
        public string $style = 'primary',
    ) {
        // Alias destructive to error
        if ($this->style === 'destructive') {
            $this->style = 'error';
        }
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.spinner', [
            'component' => $this,
            'styleClass' => Theme::spinner($this->size, $this->style),
        ]);
    }
}
