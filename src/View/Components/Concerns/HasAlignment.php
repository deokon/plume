<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasAlignment
{
    /**
     * Resolve positioning classes (top, bottom, left, right).
     */
    protected function resolvePosition(string $position, int $offset = 2): string
    {
        $offsets = [
            'top' => "bottom-full mb-{$offset}",
            'bottom' => "top-full mt-{$offset}",
            'left' => "right-full mr-{$offset}",
            'right' => "left-full ml-{$offset}",
        ];

        return $offsets[$position] ?? $offsets['top'];
    }

    /**
     * Resolve alignment classes relative to position.
     */
    protected function resolveAlignment(string $align, string $position = 'bottom'): string
    {
        // For vertical positioning (top/bottom), align horizontally
        if (in_array($position, ['top', 'bottom'])) {
            return match ($align) {
                'start' => 'left-0',
                'end' => 'right-0',
                default => 'left-1/2 -translate-x-1/2',
            };
        }

        // For horizontal positioning (left/right), align vertically
        return match ($align) {
            'start' => 'top-0',
            'end' => 'bottom-0',
            default => 'top-1/2 -translate-y-1/2',
        };
    }
}
