<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Number extends BaseFormComponent
{
    public $after;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = null,
        public ?int $min = null,
        public ?int $max = null,
        public ?int $step = null,
        public string $placeholder = '',
    ) {
        parent::__construct($label, $name, $id, $model, $value);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.number', [
            'component' => $this,
            'component' => $this,
        ]);
    }
}