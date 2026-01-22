<?php

namespace deokon\Plume\View\Components\Command;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Command extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $trigger = null,
        public string $placeholder = 'Type a command or search...',
        public ?string $id = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command.index', [
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }
}