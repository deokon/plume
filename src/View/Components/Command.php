<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use Illuminate\Support\Str;

class Command extends Component
{
    public function __construct(
        public string $placeholder = 'Type a command or search...',
        public ?string $id = null,
        public mixed $content = null,
    ) {
        $this->id = $id ?? Str::random(8);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.command', [
            'enter' => $this->transitions('overlay-enter'),
            'leave' => $this->transitions('overlay-leave'),
        ]);
    }

    protected function transitions(string $type = 'default'): string
    {
        $durations = [
            'fast' => 'duration-150',
            'default' => 'duration-300',
            'slow' => 'duration-500',
            'overlay-enter' => 'ease-out duration-300',
            'overlay-leave' => 'ease-in duration-200',
        ];

        return $durations[$type] ?? $durations['default'];
    }
}
