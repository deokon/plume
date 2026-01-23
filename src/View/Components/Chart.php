<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Chart extends Component
{
    public array $values;
    public array $labels;
    public float $max;
    public int $count;

    public function __construct(
        public string $type = 'bar',
        public array $data = [],
        public int $height = 200,
        public string $color = 'text-primary',
    ) {
        $normalizedData = array_map(function ($d) {
            return is_array($d) ? $d : ['label' => '', 'value' => $d];
        }, $data);

        $this->values = array_column($normalizedData, 'value');
        $this->labels = array_column($normalizedData, 'label');
        $this->max = (float) (count($this->values) > 0 ? max($this->values) : 0);
        $this->count = count($this->values);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.chart', [
            'component' => $this,'component' => $this]);
    }
}
