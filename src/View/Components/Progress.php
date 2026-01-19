<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Progress extends Component
{
    public function __construct(
        public int $value = 0,
        public int $max = 100,
        public string $style = 'default',
        public ?string $title = null,
        public ?string $display = 'percentage',
        public ?string $model = null,
    ) {
        $this->value = max(0, min($this->max, $this->value));
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.progress', [
            'styleClass' => \deokon\Plume\Theme::progress($this->style),
            'value' => $this->value,
            'max' => $this->max,
            'title' => $this->title,
            'display' => $this->display,
            'model' => $this->model,
        ]);
    }

    protected function themeStyles(): string
    {
        $styles = [
            'secondary' => 'bg-secondary',
            'destructive' => 'bg-destructive',
            'success' => 'bg-primary',
            'default' => 'bg-primary',
        ];

        return $styles[$this->style] ?? $styles['default'];
    }
}