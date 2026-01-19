<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Button extends Component
{
    public function __construct(
        public ?string $href = null,
        public ?string $icon = null,
        public bool $fullWidth = false,
        public string $size = 'md',
        public string $style = 'default',
        public string $shape = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button', [
            'classes' => $this->classes(),
        ]);
    }

    public function classes(): string
    {
        $base = 'inline-flex items-center justify-center whitespace-nowrap transition-all shrink-0 outline-none focus-visible:border-primary focus-visible:ring-primary/50 focus-visible:ring-[3px] dark:focus-visible:border-primary-200 dark:focus-visible:ring-primary-200/50 hover:cursor-pointer active:scale-95 disabled:pointer-events-none disabled:opacity-70 disabled:cursor-default disabled:saturate-30 [&_span.icon]:pointer-events-none [&_span.icon:not([class*=\'size-\'])]:size-8 [&_span.icon]:shrink-0 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive';

        if ($this->fullWidth) {
            $base .= ' w-full';
        }

        return $base . ' ' . $this->themeClasses();
    }

    protected function themeClasses(): string
    {
        $sizes = [
            'sm' => 'text-sm font-medium gap-1.5 px-3 py-1.5',
            'lg' => 'text-xl font-medium gap-2.5 px-5 py-3',
            'md' => 'text-base font-medium gap-2 px-4 py-2.5',
        ];

        $styles = [
            'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary-300 dark:hover:bg-secondary/80',
            'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive-800 dark:hover:bg-destructive/80',
            'outline' => 'border bg-none shadow-xs hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
            'ghost' => 'hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
            'link' => 'underline-offset-4 hover:underline text-primary',
            'minor' => 'text-foreground/50 hover:text-primary hover:bg-primary/10 dark:text-background-300 dark:hover:text-primary-400 dark:hover:bg-primary/10 scale-90 transition-all',
            'default' => 'bg-primary text-primary-foreground hover:bg-primary-800 dark:hover:bg-primary/80',
        ];

        $shapes = [
            'pill' => 'rounded-full',
            'round' => 'rounded-full aspect-square p-0',
            'default' => 'rounded-md',
        ];

        return ($sizes[$this->size] ?? $sizes['md']) . ' ' .
            ($styles[$this->style] ?? $styles['default']) . ' ' .
            ($shapes[$this->shape] ?? $shapes['default']);
    }
}
