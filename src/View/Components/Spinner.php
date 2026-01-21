<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Spinner extends Component
{
    public function __construct(
        public string $size = 'md',
        public string $style = 'primary',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.spinner', [
            'styleClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $sizes = [
            'xs' => 'size-3',
            'sm' => 'size-4',
            'lg' => 'size-8',
            'xl' => 'size-12',
            'md' => 'size-6',
        ];

        $styles = [
            'primary' => 'text-primary',
            'secondary' => 'text-secondary-foreground',
            'destructive' => 'text-destructive',
            'background' => 'text-background-400',
            'white' => 'text-white',
        ];

        return ($sizes[$this->size] ?? $sizes['md']) . ' ' . ($styles[$this->style] ?? $styles['primary']);
    }
}
