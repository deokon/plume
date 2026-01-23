<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Checkbox extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        string $value = '',
        public bool $checked = false,
    ) {
        parent::__construct($label, $name, $id, $model, $value);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.checkbox', [
            'component' => $this,
        ]);
    }
}
