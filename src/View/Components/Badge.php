<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Badge extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public string $style = 'default',
        public string $size = 'md',
        public string $shape = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.badge', [
            'component' => $this,
            'component' => $this,
        ]);
    }

    public function classes(string $style = 'default', string $size = 'md', string $shape = 'default'): string
    {
        $base = 'inline-flex items-center rounded-md border font-semibold';

        $styles = [
            'secondary' => 'bg-secondary-200 text-secondary-foreground border-secondary-300 dark:bg-secondary-800 dark:text-secondary-100 dark:border-secondary-700',
            'destructive' => 'bg-destructive-600 text-destructive-foreground border-destructive-700 dark:bg-destructive-800 dark:text-destructive-100 dark:border-destructive-900',
            'outline' => 'border text-foreground dark:text-background-200 border-background-200 dark:border-background-700',
            'success' => 'bg-primary-100 text-primary-800 border-primary-200 dark:bg-primary-900/30 dark:text-primary-300 dark:border-primary-800',
            'default' => 'bg-primary text-primary-foreground border-transparent',
        ];

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
            $this->getClasses($styles, $style) . ' ' .
            $this->getClasses($sizes, $size) . ' ' .
            $this->getClasses($shapes, $shape);
    }
}
