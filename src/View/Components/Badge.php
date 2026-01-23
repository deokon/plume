<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\Theme;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Badge extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $style = 'default',
        public string $size = 'md',
        public string $shape = 'default',
    ) {
        // Alias destructive to error
        if ($this->style === 'destructive') {
            $this->style = 'error';
        }
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.badge', [
            'component' => $this,
        ]);
    }

    public function classes(string $style = 'default', string $size = 'md', string $shape = 'default'): string
    {
        $base = 'inline-flex items-center font-semibold';

        $sizes = [
            'sm' => 'px-2 py-0.5 text-[10px]',
            'md' => 'px-2.5 py-0.5 text-xs',
            'lg' => 'px-3 py-1 text-sm',
        ];

        $shapes = [
            'pill' => 'rounded-full',
            'default' => 'rounded-md',
        ];

        return $base . ' ' .
            Theme::badge($style) . ' ' .
            $this->getClasses($sizes, $size) . ' ' .
            $this->getClasses($shapes, $shape);
    }
}
