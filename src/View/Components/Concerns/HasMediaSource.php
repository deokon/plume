<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasMediaSource
{
    public string $src;
    public string $alt;

    /**
     * Initialize media source properties.
     */
    protected function initializeMediaSource(string $src, string $alt = ''): void
    {
        $this->src = $src;
        $this->alt = $alt;
    }
}
