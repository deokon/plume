<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

class Avatar extends Component
{
    use InteractsWithAttributes, HasStyles;

    public function __construct(
        public ?string $src = null,
        public string $alt = '',
        public string $fallback = '',
        public string $size = 'md',
        public ?string $status = null,
        public string $shape = 'round',
    ) {}

    public function render(): View|Closure|string
    {
        return view('plume::components-class.avatar', [
            'component' => $this,
        ]);
    }

    public function classes(string $size = 'md', string $shape = 'round'): string
    {
        $base = 'relative flex shrink-0 cursor-pointer';
        $theme = \deokon\Plume\Theme::avatar($size);

        $shapes = [
            'round' => 'rounded-full',
            'pill' => 'rounded-full',
            'default' => 'rounded-md',
        ];

        return $base . ' ' .
            ($theme['container'] ?? 'size-8 text-xs') . ' ' .
            $this->getClasses($shapes, $shape);
    }

    public function statusClasses(string $size = 'md'): string
    {
        $base = 'absolute bottom-0 right-0 block rounded-full ring-2 ring-background';
        $theme = \deokon\Plume\Theme::avatar($size);

        $colors = [
            'online' => 'bg-primary',
            'offline' => 'bg-background-400',
            'away' => 'bg-secondary-500',
            'busy' => 'bg-destructive-500',
        ];

        return $base . ' ' .
            ($theme['status'] ?? 'size-2') . ' ' .
            ($colors[$this->status] ?? $this->status);
    }
}
