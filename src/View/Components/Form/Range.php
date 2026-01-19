<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Range extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        public ?string $value = '0',
        public int $min = 0,
        public int $max = 100,
        public int $step = 1,
    ) {
        parent::__construct($label, $name, $id, $model, $value);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.range', [
            'component' => $this,
        ]);
    }
}
