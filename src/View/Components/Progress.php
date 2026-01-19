<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Progress extends Component
{
    public function __construct(
        public int $value = 0,
        public string $style = 'default',
    ) {
        $this->value = max(0, min(100, $this->value));
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.progress', [
            'styleClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $styles = [
            'secondary' => 'bg-secondary',
            'destructive' => 'bg-destructive',
            'success' => 'bg-primary',
            'default' => 'bg-primary',
        ];

        return $styles[$this->style] ?? $styles['default'];
    }
}