<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Card extends Component
{
    public $header;
    public $footer;

    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public ?string $badge = null,
        public string $badgeStyle = 'default',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.card');
    }

    public function hasHeader(): bool
    {
        return $this->title 
            || $this->description 
            || $this->badge 
            || (isset($this->header) && $this->header->isNotEmpty());
    }

    public function hasFooter(): bool
    {
        return isset($this->footer) && $this->footer->isNotEmpty();
    }
}
