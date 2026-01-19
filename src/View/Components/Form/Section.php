<?php

namespace deokon\Plume\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Section extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public int $minCols = 1,
        public ?int $maxCols = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.form.section', [
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $max = $this->maxCols ?? $this->minCols;
        
        $minClass = "grid-cols-{$this->minCols}";
        $maxClass = "sm:grid-cols-{$max}";

        return "grid {$minClass} {$maxClass} gap-6";
    }
}
