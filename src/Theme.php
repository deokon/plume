<?php

namespace deokon\Plume;

class Theme
{
    public static function button(string $style = 'default', string $size = 'md', string $shape = 'default'): string
    {
        $sizes = [
            'sm' => 'text-sm font-medium gap-1.5 px-3 py-1.5',
            'lg' => 'text-xl font-medium gap-2.5 px-5 py-3',
            'md' => 'text-base font-medium gap-2 px-4 py-2.5',
        ];

        $styles = [
            'secondary' => 'bg-secondary text-secondary-foreground hover:bg-secondary-300 dark:hover:bg-secondary/80',
            'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive-800 dark:hover:bg-destructive/80',
            'outline' => 'border bg-none shadow-xs hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
            'ghost' => 'hover:bg-primary/20 hover:text-foreground dark:hover:bg-background-700 dark:hover:text-background-200',
            'link' => 'underline-offset-4 hover:underline text-primary',
            'minor' => 'text-foreground/50 hover:text-primary hover:bg-primary/10 dark:text-background-300 dark:hover:text-primary-400 dark:hover:bg-primary/10 scale-90 transition-all',
            'default' => 'bg-primary text-primary-foreground hover:bg-primary-800 dark:hover:bg-primary/80',
        ];

        $shapes = [
            'pill' => 'rounded-full',
            'round' => 'rounded-full aspect-square p-0',
            'default' => 'rounded-md',
        ];

        return ($sizes[$size] ?? $sizes['md']) . ' ' .
            ($styles[$style] ?? $styles['default']) . ' ' .
            ($shapes[$shape] ?? $shapes['default']);
    }

    public static function alert(string $style = 'info'): array
    {
        $styles = [
            'info' => [
                'container' => 'bg-background-100 dark:bg-background-600/50 text-foreground dark:text-background-200 border-background-200 dark:border-background-700',
                'icon' => 'text-primary-500 dark:text-background-200',
                'icon_name' => 'icon-[fluent--info-24-regular]',
            ],
            'success' => [
                'container' => 'bg-primary-100 dark:bg-primary-500/30 text-primary-800 dark:text-primary-200 border-primary-300 dark:border-primary-500/50',
                'icon' => 'text-primary-500 dark:text-primary-300',
                'icon_name' => 'icon-[fluent--checkmark-circle-24-regular]',
            ],
            'warning' => [
                'container' => 'bg-destructive-50 dark:bg-destructive-300/30 text-secondary-800 dark:text-secondary-100 border-destructive-100 dark:border-destructive-300/50',
                'icon' => 'text-secondary-500 dark:text-secondary-300',
                'icon_name' => 'icon-[fluent--warning-24-regular]',
            ],
            'destructive' => [
                'container' => 'bg-destructive-100 dark:bg-destructive-500/30 text-destructive-800 dark:text-destructive-200 border-destructive-300 dark:border-destructive-500/50',
                'icon' => 'text-destructive-500 dark:text-destructive-300',
                'icon_name' => 'icon-[fluent--error-circle-24-regular]',
            ],
        ];

        return $styles[$style] ?? $styles['info'];
    }

    public static function badge(string $style = 'default'): string
    {
        $styles = [
            'secondary' => 'bg-secondary-200 text-secondary-foreground border-secondary-300 dark:bg-secondary-800 dark:text-secondary-100 dark:border-secondary-700',
            'destructive' => 'bg-destructive-600 text-destructive-foreground border-destructive-700 dark:bg-destructive-800 dark:text-destructive-100 dark:border-destructive-900',
            'outline' => 'border text-foreground dark:text-background-200 border-background-200 dark:border-background-700',
            'success' => 'bg-primary text-primary-foreground border-transparent dark:bg-primary-600',
            'default' => 'bg-primary text-primary-foreground border-transparent dark:bg-primary-600',
        ];

        return $styles[$style] ?? $styles['default'];
    }

    public static function avatar(string $size = 'md'): array
    {
        $sizes = [
            'xs' => ['container' => 'size-4 text-[8px]', 'status' => 'size-1'],
            'sm' => ['container' => 'size-6 text-[10px]', 'status' => 'size-1.5'],
            'lg' => ['container' => 'size-10 text-base', 'status' => 'size-2.5'],
            'xl' => ['container' => 'size-12 text-lg', 'status' => 'size-3'],
            'md' => ['container' => 'size-8 text-xs', 'status' => 'size-2'],
        ];

        return $sizes[$size] ?? $sizes['md'];
    }

    public static function spinner(string $size = 'md', string $style = 'primary'): string
    {
        $sizes = [
            'xs' => 'size-3',
            'sm' => 'size-4',
            'lg' => 'size-8',
            'xl' => 'size-12',
            'md' => 'size-6',
        ];

        $styles = [
            'primary' => 'text-primary',
            'secondary' => 'text-secondary-foreground',
            'destructive' => 'text-destructive',
            'background' => 'text-background-400',
        ];

        return ($sizes[$size] ?? $sizes['md']) . ' ' . ($styles[$style] ?? $styles['primary']);
    }

    public static function modal(string $maxWidth = '2xl'): string
    {
        $widths = [
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            '2xl' => 'sm:max-w-2xl',
        ];

        return $widths[$maxWidth] ?? $widths['2xl'];
    }

    public static function drawer(string $side = 'right'): array
    {
        $classes = [
            'left' => 'left-0 h-full w-full max-w-sm border-r',
            'top' => 'top-0 w-full h-auto max-h-[80vh] border-b',
            'bottom' => 'bottom-0 w-full h-auto max-h-[80vh] border-t',
            'right' => 'right-0 h-full w-full max-w-sm border-l',
        ];

        $transitions = [
            'left' => 'x-transition:enter-start="-translate-x-full" x-transition:leave-end="-translate-x-full"',
            'top' => 'x-transition:enter-start="-translate-y-full" x-transition:leave-end="-translate-y-full"',
            'bottom' => 'x-transition:enter-start="translate-y-full" x-transition:leave-end="translate-y-full"',
            'right' => 'x-transition:enter-start="translate-x-full" x-transition:leave-end="translate-x-full"',
        ];

        return [
            'classes' => $classes[$side] ?? $classes['right'],
            'transition' => $transitions[$side] ?? $transitions['right'],
        ];
    }

    public static function table(string $density = 'default'): string
    {
        $densities = [
            'compact' => '[&_td]:p-2 [&_th]:h-8 [&_th]:px-2',
            'loose' => '[&_td]:p-6 [&_th]:h-16 [&_th]:px-6',
            'default' => '[&_td]:p-4 [&_th]:h-12 [&_th]:px-4',
        ];

        return $densities[$density] ?? $densities['default'];
    }

    public static function dropdown(string $align = 'right', string $width = 'md'): array
    {
        $alignments = [
            'left' => 'origin-top-left left-0',
            'top' => 'origin-top',
            'right' => 'origin-top-right right-0',
        ];

        $widths = [
            'xs' => 'w-32',
            'sm' => 'w-48',
            'md' => 'w-56',
            'lg' => 'w-64',
            'xl' => 'w-80',
        ];

        return [
            'align' => $alignments[$align] ?? $alignments['right'],
            'width' => $widths[$width] ?? $width, // Allow arbitrary width classes if not a key
        ];
    }

    public static function kbd(string $size = 'md'): string
    {
        $sizes = [
            'sm' => 'px-1 text-[10px] min-w-[16px] h-4',
            'md' => 'px-1.5 text-xs min-w-[20px] h-5',
            'lg' => 'px-2 text-sm min-w-[24px] h-6',
        ];

        return $sizes[$size] ?? $sizes['md'];
    }

    public static function progress(string $style = 'default'): string
    {
        $styles = [
            'secondary' => 'bg-secondary',
            'destructive' => 'bg-destructive',
            'success' => 'bg-primary',
            'default' => 'bg-primary',
        ];

        return $styles[$style] ?? $styles['default'];
    }

    public static function tabs(string $side = 'top'): string
    {
        $directions = [
            'left' => 'flex-row',
            'right' => 'flex-row-reverse',
            'top' => 'flex-col',
            'bottom' => 'flex-col-reverse', // Adding bottom support logically, though main implementation defaults to flex-col
        ];

        return $directions[$side] ?? 'flex-col';
    }

    public static function transitions(string $type = 'default'): string
    {
        $durations = [
            'fast' => 'duration-150',
            'default' => 'duration-300',
            'slow' => 'duration-500',
            'overlay-enter' => 'ease-out duration-300',
            'overlay-leave' => 'ease-in duration-200',
        ];

        return $durations[$type] ?? $durations['default'];
    }
}
