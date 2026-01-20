<?php

namespace deokon\Plume\View\Components;

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
        public ?string $id = null,
    ) {
        $this->id = $this->id ?? $this->uniqueId('command');
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command', [
            'component' => $this,
            'trigger' => $this->trigger,
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }
}
