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
            'secondary' => 'bg-secondary-200 text-secondary-foreground border-secondary-300',
            'destructive' => 'bg-destructive-600 text-destructive-foreground border-destructive-700',
            'outline' => 'border text-foreground dark:text-background-200',
            'success' => 'bg-primary text-primary-foreground border-transparent',
            'default' => 'bg-primary text-primary-foreground border-transparent',
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
}
