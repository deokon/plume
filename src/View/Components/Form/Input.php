<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasIcon;

class Input extends BaseFormComponent
{
    use HasIcon;

    public $after;
    public $rightSide;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = '',
        public string $type = 'text',
        public string $placeholder = '',
        ?string $icon = null,
    ) {
        parent::__construct($label, $name, $id, $model, $value);
        $this->initializeIcon($icon);
    }

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
