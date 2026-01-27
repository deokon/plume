<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

abstract class BaseOverlayComponent extends Component
{
    use InteractsWithAttributes, HasStyles;

    public $header;
    public $footer;

    public function __construct(
        public string $name,
        public bool $show = false,
        public bool $persistent = false,
        public ?string $title = null,
        public ?string $onOpen = null,
        public ?string $onClose = null,
    ) {}
}
