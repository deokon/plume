<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class EmptyState extends Component
{
    public function __construct(
        public string $title = 'No results found',
        public ?string $description = null,
        public string $icon = 'icon-[fluent--search-info-24-regular]',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.empty-state', [
            'component' => $this
        ]);
    }
}
