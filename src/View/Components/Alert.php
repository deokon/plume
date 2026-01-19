<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Alert extends Component
{
    public function __construct(
        public ?string $icon = null,
        public string $style = 'info',
        public bool $closable = false,
        public ?int $autoclose = null,
        public ?string $title = null,
        public ?string $onClose = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.alert', [
            'containerClasses' => $this->containerClasses(),
            'iconClasses' => $this->iconClasses(),
            'resolvedIcon' => $this->icon ?? $this->defaultIcon(),
        ]);
    }

    protected function themeStyles(): array
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

        return $styles[$this->style] ?? $styles['info'];
    }

    public function containerClasses(): string
    {
        return $this->themeStyles()['container'];
    }

    public function iconClasses(): string
    {
        return $this->themeStyles()['icon'];
    }

    public function defaultIcon(): string
    {
        return $this->themeStyles()['icon_name'];
    }
}
