<?php

namespace deokon\Plume\View\Components\Button;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Loader extends Component
{
    public function __construct(
        public string $var,
        public string $size = 'md',
        public ?string $style = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button.loader', [
            'component' => $this,
            'spinnerSize' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        return match ($this->size) {
            'sm' => 'sm',
            'lg' => 'md',
            default => 'sm',
        };
    }
}
