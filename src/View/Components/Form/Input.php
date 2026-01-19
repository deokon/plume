<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;

class Input extends Component
{
    use ResolvesId;

    public $after;
    public $rightSide;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $id = null,
        public string $type = 'text',
        public ?string $model = null,
        public ?string $value = '',
        public string $placeholder = '',
        public ?string $icon = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.input', [
            'component' => $this,
        ]);
    }

    public function inputClasses(?string $icon = null, bool $hasRightSide = false): string
    {
        $base = 'block w-full px-3 py-2 border rounded-md shadow-sm placeholder-foreground/50 dark:placeholder-background-400 border-background-700/40 dark:border-background-400/20 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm bg-background-50 dark:bg-background-700 transition-colors';
        
        if ($icon) {
            $base .= ' pl-10';
        }
        
        if ($hasRightSide) {
            $base .= ' pr-10';
        }

        return $base;
    }
}
