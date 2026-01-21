<?php

namespace deokon\Plume\View\Components\Progress;

use Illuminate\View\View;
use Closure;

class Percent extends Progress
{
    public function __construct(
        int $value = 0,
        int $max = 100,
        string $style = 'default',
        ?string $title = null,
        ?string $model = null,
    ) {
        parent::__construct($value, $max, $style, $title, 'percentage', $model);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.progress.index', [
            'styleClass' => \deokon\Plume\Theme::progress($this->style),
            'value' => $this->value,
            'max' => $this->max,
            'title' => $this->title,
            'display' => $this->display,
            'model' => $this->model,
        ]);
    }
}