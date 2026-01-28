<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\Theme;

class AlertDialog extends BaseOverlayComponent
{
    public function __construct(
        string $name = 'alert-dialog',
        bool $show = false,
        public string $maxWidth = '2xl',
        public string $action = 'Confirm',
        public bool $withCancel = true,
        public string $onConfirm = '',
    ) {
        parent::__construct($name, $show, false, null, null, null);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.alert-dialog', [
            'component' => $this,
            'maxWidthClass' => Theme::modal($this->maxWidth),
        ]);
    }
}
