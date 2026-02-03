<?php

namespace deokon\Plume\View\Components\Command;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Form\Concerns\ResolvesId;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Command extends Component
{
    use ResolvesId, InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $trigger = null,
        public string $placeholder = 'Type a command or search...',
        public ?string $model = null,
        public ?string $id = null,
        public ?string $onOpen = null,
        public ?string $onClose = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command.index', [
            'component' => $this,
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }
}