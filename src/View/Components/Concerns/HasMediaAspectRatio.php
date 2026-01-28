<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasMediaAspectRatio
{
    /**
     * Resolve aspect ratio class from a given value.
     */
    protected function resolveAspectRatio(?string $ratio, string $default = ''): string
    {
        if (!$ratio) {
            return $default;
        }

        return match ($ratio) {
            'square', '1/1' => 'aspect-square',
            'video', '16/9' => 'aspect-video',
            '4/3' => 'aspect-[4/3]',
            '3/4' => 'aspect-[3/4]',
            '3/2' => 'aspect-[3/2]',
            '2/3' => 'aspect-[2/3]',
            '21/9', 'cinema' => 'aspect-[21/9]',
            '9/16' => 'aspect-[9/16]',
            default => str_starts_with($ratio, 'aspect-') ? $ratio : 'aspect-[' . $ratio . ']',
        };
    }
}
