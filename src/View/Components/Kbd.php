<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Kbd extends Component
{
    public function __construct(
        public string $size = 'md',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.kbd', [
            'component' => $this,
            'styleClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $sizes = [
            'sm' => 'px-1 text-[10px] min-w-[16px] h-4',
            'md' => 'px-1.5 text-xs min-w-[20px] h-5',
            'lg' => 'px-2 text-sm min-w-[24px] h-6',
        ];

        return $sizes[$this->size] ?? $sizes['md'];
    }
}
