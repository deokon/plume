<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

use deokon\Plume\Theme;

class Modal extends BaseOverlayComponent
{
    public function __construct(
        string $name,
        bool $show = false,
        bool $persistent = false,
        public string $maxWidth = '2xl',
        ?string $title = null,
        ?string $onOpen = null,
        ?string $onClose = null,
    ) {
        parent::__construct($name, $show, $persistent, $title, $onOpen, $onClose);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.modal', [
            'component' => $this,
            'maxWidthClass' => Theme::modal($this->maxWidth),
            'enter' => Theme::transitions('overlay-enter'),
            'leave' => Theme::transitions('overlay-leave'),
        ]);
    }
}
