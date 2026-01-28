<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

use deokon
Plume\View\Components\Concerns\HasIcon;

class Password extends BaseFormComponent
{
    use HasIcon;

    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        ?string $value = '',
        public string $placeholder = '',
        ?string $icon = 'icon-[fluent--lock-closed-24-regular]',
    ) {
        parent::__construct($label, $name, $id, $model, $value);
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.password', [
            'component' => $this,
        ]);
    }
}
