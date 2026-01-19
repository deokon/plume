<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;

class Element extends Component
{
    use ResolvesId;

    public $after;

    public function __construct(
        public string $label = '',
        public ?string $name = null,
        public ?string $id = null,
        public ?string $model = null,
    ) {
        $this->name = $this->name ?? $this->model;
        $this->id = $this->resolveId($this->name, $this->model, $this->id);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.element');
    }
}
