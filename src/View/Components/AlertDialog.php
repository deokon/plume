<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class AlertDialog extends Component
{
    public function __construct(
        public string $name = 'alert-dialog',
        public bool $show = false,
        public string $maxWidth = '2xl',
        public string $action = 'Confirm',
        public bool $withCancel = true,
        public string $onConfirm = '',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.alert-dialog', [
            'component' => $this,'component' => $this]);
    }
}
