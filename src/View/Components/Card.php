<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;

use Illuminate\View\View;
use Closure;
use Illuminate\View\ComponentSlot;

class Card extends Component
{
    public $header;
    public $footer;

    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public ?string $badge = null,
        public string $badgeStyle = 'default',
        public ?string $href = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.card', [
            'component' => $this,'component' => $this]);
    }

    public function hasHeader(): bool
    {
        return ($this->header instanceof ComponentSlot && $this->header->isNotEmpty()) 
            || $this->title 
            || $this->description 
            || $this->badge;
    }

    public function hasFooter(): bool
    {
        return $this->footer instanceof ComponentSlot && $this->footer->isNotEmpty();
    }
}
