<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasIcon
{
    public ?string $icon;

    /**
     * Initialize icon property.
     */
    protected function initializeIcon(?string $icon = null): void
    {
        $this->icon = $icon;
    }
}
