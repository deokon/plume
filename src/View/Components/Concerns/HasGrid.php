<?php

namespace deokon\Plume\View\Components\Concerns;

trait HasGrid
{
    /**
     * Resolve grid column and gap classes.
     * 
     * @param int $cols Default columns if min/max not set.
     * @param int $gap Grid gap.
     * @param int|null $minCols Minimum columns (mobile).
     * @param int|null $maxCols Maximum columns (desktop).
     * @return string
     */
    protected function gridClasses(int $cols = 3, int $gap = 4, ?int $minCols = null, ?int $maxCols = null): string
    {
        if ($minCols !== null || $maxCols !== null) {
            $min = $minCols ?? 1;
            $max = $maxCols ?? $cols;

            $minClass = match ($min) {
                1 => 'grid-cols-1',
                2 => 'grid-cols-2',
                3 => 'grid-cols-3',
                4 => 'grid-cols-4',
                5 => 'grid-cols-5',
                6 => 'grid-cols-6',
                12 => 'grid-cols-12',
                default => 'grid-cols-1',
            };

            $maxClass = match ($max) {
                1 => 'lg:grid-cols-1',
                2 => 'lg:grid-cols-2',
                3 => 'lg:grid-cols-3',
                4 => 'lg:grid-cols-4',
                5 => 'lg:grid-cols-5',
                6 => 'lg:grid-cols-6',
                12 => 'lg:grid-cols-12',
                default => 'lg:grid-cols-3',
            };

            // Calculate middle ground for sm/md
            $smClass = '';
            if ($max - $min >= 2) {
                $mid = (int) ceil(($min + $max) / 2);
                $smClass = match ($mid) {
                    2 => 'sm:grid-cols-2',
                    3 => 'sm:grid-cols-3',
                    4 => 'sm:grid-cols-4',
                    5 => 'sm:grid-cols-5',
                    6 => 'sm:grid-cols-6',
                    default => '',
                };
            } elseif ($max > $min) {
                $smClass = match ($max) {
                    2 => 'sm:grid-cols-2',
                    3 => 'sm:grid-cols-2',
                    4 => 'sm:grid-cols-3',
                    5 => 'sm:grid-cols-4',
                    6 => 'sm:grid-cols-5',
                    default => '',
                };
            }
        } else {
            $minClass = match ($cols) {
                1 => 'grid-cols-1',
                2 => 'grid-cols-1',
                3 => 'grid-cols-1',
                4 => 'grid-cols-2',
                12 => 'grid-cols-4',
                default => 'grid-cols-1',
            };

            $smClass = match ($cols) {
                1 => '',
                2 => 'sm:grid-cols-2',
                3 => 'sm:grid-cols-2',
                4 => 'sm:grid-cols-3',
                12 => 'sm:grid-cols-6',
                default => 'sm:grid-cols-2',
            };

            $maxClass = match ($cols) {
                1 => '',
                2 => '',
                3 => 'lg:grid-cols-3',
                4 => 'lg:grid-cols-4',
                12 => 'lg:grid-cols-12',
                default => 'lg:grid-cols-3',
            };
        }

        $gapClass = match ($gap) {
            0 => 'gap-0',
            1 => 'gap-1',
            2 => 'gap-2',
            3 => 'gap-3',
            4 => 'gap-4',
            5 => 'gap-5',
            6 => 'gap-6',
            8 => 'gap-8',
            10 => 'gap-10',
            12 => 'gap-12',
            default => 'gap-4',
        };

        return trim("{$minClass} {$smClass} {$maxClass} {$gapClass}");
    }
}
