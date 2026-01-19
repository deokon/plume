<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Calendar extends Component
{
    public function __construct(
        public ?string $model = null,
        public mixed $value = null,
        public ?string $min = null,
        public ?string $max = null,
        public string $mode = 'single',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.calendar', [
            'initialValue' => $this->initialValue(),
        ]);
    }

    protected function initialValue(): string
    {
        if ($this->value) {
            return $this->mode === 'range' ? json_encode($this->value) : "'$this->value'";
        }
        
        return $this->mode === 'range' ? '[]' : 'null';
    }
}
