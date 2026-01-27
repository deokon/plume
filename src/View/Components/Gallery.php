<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Gallery extends Component
{
    public function __construct(
        public int $cols = 3,
        public int $gap = 4,
        public ?int $minCols = null,
        public ?int $maxCols = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.gallery', [
            'component' => $this,
            'gridClasses' => $this->themeStyles(),
        ]);
    }

    protected function themeStyles(): string
    {
        if ($this->minCols !== null || $this->maxCols !== null) {
            $min = $this->minCols ?? 1;
            $max = $this->maxCols ?? $this->cols;

            $minClass = match ($min) {
                1 => 'grid-cols-1',
                2 => 'grid-cols-2',
                3 => 'grid-cols-3',
                4 => 'grid-cols-4',
                5 => 'grid-cols-5',
                6 => 'grid-cols-6',
                default => 'grid-cols-1',
            };

            $maxClass = match ($max) {
                1 => 'lg:grid-cols-1',
                2 => 'lg:grid-cols-2',
                3 => 'lg:grid-cols-3',
                4 => 'lg:grid-cols-4',
                5 => 'lg:grid-cols-5',
                6 => 'lg:grid-cols-6',
                default => 'lg:grid-cols-3',
            };

            // Calculate a middle ground for sm/md if range is large enough
            $smClass = '';
            if ($max - $min >= 2) {
                $mid = (int) ceil(($min + $max) / 2);
                $smClass = match ($mid) {
                    2 => 'sm:grid-cols-2',
                    3 => 'sm:grid-cols-3',
                    4 => 'sm:grid-cols-4',
                    5 => 'sm:grid-cols-5',
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
            $minClass = match ($this->cols) {
                1 => 'grid-cols-1',
                2 => 'grid-cols-1',
                3 => 'grid-cols-1',
                4 => 'grid-cols-2',
                default => 'grid-cols-1',
            };

            $smClass = match ($this->cols) {
                1 => '',
                2 => 'sm:grid-cols-2',
                3 => 'sm:grid-cols-2',
                4 => 'sm:grid-cols-3',
                default => 'sm:grid-cols-2',
            };

            $maxClass = match ($this->cols) {
                1 => '',
                2 => '',
                3 => 'lg:grid-cols-3',
                4 => 'lg:grid-cols-4',
                default => 'lg:grid-cols-3',
            };
        }

        $gapClass = match ($this->gap) {
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
