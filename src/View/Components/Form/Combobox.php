<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\View;
use Closure;

class Combobox extends BaseFormComponent
{
    public function __construct(
        ?string $label = null,
        ?string $name = null,
        ?string $id = null,
        ?string $model = null,
        public array $options = [],
        public string $placeholder = 'Select option...',
        public string $emptyMessage = 'No results found.',
        public ?string $onSelect = null,
    ) {
        parent::__construct($label, $name, $id, $model, '');

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
