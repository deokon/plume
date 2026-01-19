<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;

class Combobox extends Component
{
    use ResolvesId;

    public function __construct(
        public ?string $label = null,
        public ?string $name = null,
        public ?string $id = null,
        public ?string $model = null,
        public array $options = [],
        public string $placeholder = 'Select option...',
    ) {
        $this->name = $this->name ?? $this->model;
        $this->id = $this->resolveId($this->name, $this->model, $this->id);

        // Normalize options to [value => label] for easier lookup in Alpine
        if (!empty($this->options) && is_array(reset($this->options))) {
            $normalized = [];
            foreach ($this->options as $option) {
                if (isset($option['value']) && isset($option['label'])) {
                    $normalized[$option['value']] = $option['label'];
                }
            }
            $this->options = $normalized;
        }
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.combobox', [
            'component' => $this,
        ]);
    }
}