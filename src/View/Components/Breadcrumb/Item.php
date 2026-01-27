<?php

namespace deokon\Plume\View\Components\Breadcrumb;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

use deokon\Plume\View\Components\Concerns\HasLink;

class Item extends Component
{
    use HasLink;

    public function __construct(
        ?string $href = null,
        bool $active = false,
    ) {
        $this->initializeLink($href, $active);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.breadcrumb.item', [
            'component' => $this
        ]);
    }
}
