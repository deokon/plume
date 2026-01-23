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
            'component' => $this,
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        $max = $this->maxCols ?? $this->minCols;

        $minCols = [
            1 => 'grid-cols-1',
            2 => 'grid-cols-2',
            3 => 'grid-cols-3',
            4 => 'grid-cols-4',
            5 => 'grid-cols-5',
            6 => 'grid-cols-6',
            12 => 'grid-cols-12',
        ];

        $maxCols = [
            1 => 'sm:grid-cols-1',
            2 => 'sm:grid-cols-2',
            3 => 'sm:grid-cols-3',
            4 => 'sm:grid-cols-4',
            5 => 'sm:grid-cols-5',
            6 => 'sm:grid-cols-6',
            12 => 'sm:grid-cols-12',
        ];

        $minClass = $minCols[$this->minCols] ?? 'grid-cols-1';
        $maxClass = $maxCols[$max] ?? 'sm:grid-cols-1';

        return "grid {$minClass} {$maxClass} gap-6";
    }
}
