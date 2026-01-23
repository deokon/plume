<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Password extends BaseFormComponent
{
    public $after;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = '',
        public string $placeholder = '',
        public ?string $icon = 'icon-[fluent--lock-closed-24-regular]',
    ) {
        parent::__construct($label, $name, $id, $model, $value);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.password', [
            'component' => $this,
        ]);
    }
}
