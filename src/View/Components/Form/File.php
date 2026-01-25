<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class File extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        public bool $multiple = false,
        public ?string $accept = null,
        public ?string $uploadUrl = null,
    ) {
        parent::__construct($label, $name, $id, $model, '');
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.file', [
            'component' => $this,
        ]);
    }
}
