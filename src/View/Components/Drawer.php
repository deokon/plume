<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

use deokon\Plume\Theme;

class Drawer extends BaseOverlayComponent
{
    public function __construct(
        string $name,
        bool $show = false,
        bool $persistent = false,
        public string $side = 'right',
        public string $maxWidth = 'sm',
        ?string $title = null,
        public ?string $description = null,
        ?string $onOpen = null,
        ?string $onClose = null,
    ) {
        parent::__construct($name, $show, $persistent, $title, $onOpen, $onClose);
    }

    public function render(): View|Closure|string
    {
        $drawerStyles = Theme::drawer($this->side, $this->maxWidth);

        return view('plume::components-class.drawer', [
            'component' => $this,
            'sideClasses' => $drawerStyles['classes'],
            'transitionAttributes' => $drawerStyles['transition'],
            'enter' => Theme::transitions('overlay-enter'),
            'leave' => Theme::transitions('overlay-leave'),
        ]);
    }
}
