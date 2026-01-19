<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Select extends BaseFormComponent
{
    public $after;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        public array $options = [],
        public ?string $placeholder = null,
        public bool $multiple = false,
    ) {
        parent::__construct($label, $name, $id, $model, '');
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.select', [
            'component' => $this,
        ]);
    }
}