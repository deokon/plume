<?php

namespace deokon\Plume\View\Components\Progress;

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
        public string $display = 'percentage',
        public ?string $model = null,
    ) {
        $this->value = max(0, min($value, $max));
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.progress.index', [
            'styleClass' => \deokon\Plume\Theme::progress($this->style),
        ]);
    }
}
