<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\Theme;

use deokon\Plume\View\Components\Concerns\HasIcon;

class Alert extends Component
{
    use HasIcon;

    public function __construct(
        ?string $icon = null,
        public string $style = 'info',
        public bool $closable = false,
        public ?int $autoclose = null,
        public ?string $title = null,
        public ?string $onClose = null,
    ) {
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        $theme = Theme::alert($this->style);

        return view('plume::components-class.alert', [
            'component' => $this,
            'containerClasses' => $theme['container'],
            'iconClasses' => $theme['icon'],
            'resolvedIcon' => $this->icon ?? $theme['icon_name'],
        ]);
    }
}
