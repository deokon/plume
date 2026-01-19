<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Toggle extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        string $value = '1',
        public bool $checked = false,
    ) {
        parent::__construct($label, $name, $id, $model, $value);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.toggle', [
            'component' => $this,
        ]);
    }
}