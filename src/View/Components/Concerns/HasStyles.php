<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasStyles
{
    /**
     * Map a variant key to its corresponding CSS classes.
     */
    public function getClasses(array $map, ?string $key, string $default = 'default'): string
    {
        return $map[$key] ?? $map[$default] ?? '';
    }

    /**
     * Common transition classes for overlays and interactive elements.
     */
    public function transitions(string $type = 'fade'): string
    {
        return match ($type) {
            'fade' => 'transition-opacity duration-200',
            'scale' => 'transition-all duration-200 transform',
            'slide-up' => 'transition-transform duration-300 translate-y-0',
            'overlay-enter' => 'transition ease-out duration-200',
            'overlay-leave' => 'transition ease-in duration-150',
            default => '',
        };
    }
}