<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class ButtonGroup extends Component
{
    public function __construct(
        public string $size = 'md',
        public bool $stack = true,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button-group', [
            'groupClasses' => $this->themeStyles(),
            'size' => $this->size,
            'stack' => $this->stack,
        ]);
    }

    protected function themeStyles(): string
    {
        $baseClass = 'inline-flex rounded-md shadow-sm border border-background-400 dark:border-background-600 overflow-hidden';

        if ($this->stack) {
            $orientationClasses = 'flex-col sm:flex-row';

            $roundingClasses = ' ' .
                '[&>:first-child]:rounded-b-none sm:[&>:first-child]:rounded-r-none sm:[&>:first-child]:rounded-bl-md' .
                ' [&>:not(:first-child):not(:last-child)]:rounded-none' .
                ' [&>:last-child]:rounded-t-none sm:[&>:last-child]:rounded-l-none sm:[&>:last-child]:rounded-tr-md';

            $borderClasses = ' ' .
                '[&>*]:border-0 [&>*:not(:last-child)]:border-b sm:[&>*:not(:last-child)]:border-b-0 sm:[&>*:not(:last-child)]:border-r' .
                ' [&>*]:border-background-400 dark:[&>*]:border-background-600';
        } else {
            $orientationClasses = 'flex-row';
            $roundingClasses = ' [&>:first-child]:rounded-r-none [&>:not(:first-child):not(:last-child)]:rounded-none [&>:last-child]:rounded-l-none';
            $borderClasses = ' [&>*]:border-0 [&>*:not(:last-child)]:border-r [&>*]:border-background-400 dark:[&>*]:border-background-600';
        }

        return $baseClass . ' ' . $orientationClasses . $roundingClasses . $borderClasses;
    }
}