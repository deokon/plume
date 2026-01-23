<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Form extends Component
{
    public function __construct(
        public string $action = '',
        public string $method = 'POST',
        public ?string $formData = null,
        public ?string $submitButton = null,
        public ?string $resetButton = null,
        public bool $hideOnSuccess = false,
        public bool $inline = false,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.index', [
            'component' => $this,'component' => $this]);
    }
}
