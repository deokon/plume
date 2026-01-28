<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Textarea extends BaseFormComponent
{
    public $after;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = '',
        public int $rows = 3,
        string $placeholder = '',
    ) {
        parent::__construct($label, $name, $id, $model, $value, $placeholder);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.textarea', [
            'component' => $this,
        ]);
    }
}
