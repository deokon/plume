<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;

class Color extends Component
{
    use ResolvesId;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $id = null,
        public ?string $model = null,
        public string $value = '#000000',
    ) {
        $this->name = $this->name ?? $this->model;
        $this->id = $this->resolveId($this->name, $this->model, $this->id);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.color');
    }
}
