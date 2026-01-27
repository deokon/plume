<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasLink
{
    public ?string $href;
    public bool $active;

    /**
     * Initialize link properties.
     */
    protected function initializeLink(?string $href = null, bool $active = false): void
    {
        $this->href = $href;
        $this->active = $active;
    }
}
