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

        return match (strtolower($ratio)) {
            'square', '1/1', '1:1' => 'aspect-square',
            'video', '16/9', '16:9', 'hd', 'widescreen' => 'aspect-video',
            '4/3', '4:3', 'standard' => 'aspect-[4/3]',
            '3/4', '3:4', 'portrait' => 'aspect-[3/4]',
            '3/2', '3:2' => 'aspect-[3/2]',
            '2/3', '2:3' => 'aspect-[2/3]',
            '21/9', '21:9', 'cinema', 'ultrawide' => 'aspect-[21/9]',
            '9/16', '9:16', 'vertical', 'vertical-video', 'story' => 'aspect-[9/16]',
            default => $default,
        };
    }
}
