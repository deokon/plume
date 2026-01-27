<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Figure extends Component
{
    public $sources;

    public function __construct(
        public string $src,
        public string $alt = '',
        public ?string $caption = null,
        public ?string $aspect = null,
        public ?string $srcset = null,
        public ?string $sizes = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.figure', [
            'component' => $this,
            'aspectClass' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        return match ($this->aspect) {
            'square', '1/1' => 'aspect-square',
            'video', '16/9' => 'aspect-video',
            '4/3' => 'aspect-[4/3]',
            '3/4' => 'aspect-[3/4]',
            '3/2' => 'aspect-[3/2]',
            '2/3' => 'aspect-[2/3]',
            '21/9' => 'aspect-[21/9]',
            '9/16' => 'aspect-[9/16]',
            default => '',
        };
    }
}
