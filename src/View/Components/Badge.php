<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Badge extends Component
{
    public function __construct(
        public string $style = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.badge', [
            'styleClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $styles = [
            'secondary' => 'bg-secondary-200 text-secondary-foreground border-secondary-300 dark:bg-secondary-800 dark:text-secondary-100 dark:border-secondary-700',
            'destructive' => 'bg-destructive-600 text-destructive-foreground border-destructive-700 dark:bg-destructive-800 dark:text-destructive-100 dark:border-destructive-900',
            'outline' => 'border text-foreground dark:text-background-200 border-background-200 dark:border-background-700',
            'success' => 'bg-primary text-primary-foreground border-transparent dark:bg-primary-600',
            'default' => 'bg-primary text-primary-foreground border-transparent dark:bg-primary-600',
        ];

        return $styles[$this->style] ?? $styles['default'];
    }
}
