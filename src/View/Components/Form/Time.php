<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Time extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = '',
        string $placeholder = '',
    ) {
        parent::__construct($label, $name, $id, $model, $value, $placeholder);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.time', [
            'component' => $this,
        ]);
    }
}
