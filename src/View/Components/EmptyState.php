<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasIcon;

class EmptyState extends Component
{
    use HasIcon;

    public function __construct(
        public string $title = 'No results found',
        public ?string $description = null,
        ?string $icon = 'icon-[fluent--search-info-24-regular]',
    ) {
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.empty-state', [
            'component' => $this
        ]);
    }
}
