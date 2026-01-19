<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;

class Avatar extends Component
{
    public function __construct(
        public ?string $src = null,
        public string $alt = '',
        public string $fallback = '',
        public string $size = 'md',
        public ?string $status = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.avatar', [
            'sizeClasses' => $this->sizeClasses(),
            'statusSizeClasses' => $this->statusSizeClasses(),
            'statusColorClasses' => $this->statusColorClasses(),
        ]);
    }

    protected function themeStyles(): array
    {
        $sizes = [
            'xs' => ['container' => 'size-4 text-[8px]', 'status' => 'size-1'],
            'sm' => ['container' => 'size-6 text-[10px]', 'status' => 'size-1.5'],
            'lg' => ['container' => 'size-10 text-base', 'status' => 'size-2.5'],
            'xl' => ['container' => 'size-12 text-lg', 'status' => 'size-3'],
            'md' => ['container' => 'size-8 text-xs', 'status' => 'size-2'],
        ];

        return $sizes[$this->size] ?? $sizes['md'];
    }

    public function sizeClasses(): string
    {
        return $this->themeStyles()['container'];
    }

    public function statusSizeClasses(): string
    {
        return $this->themeStyles()['status'];
    }

    public function statusColorClasses(): string
    {
        return match ($this->status) {
            'online' => 'bg-emerald-500 dark:bg-emerald-400',
            'away' => 'bg-amber-500 dark:bg-amber-400',
            'busy' => 'bg-rose-500 dark:bg-rose-400',
            'offline' => 'bg-slate-500 dark:bg-slate-400',
            default => '',
        };
    }
}
