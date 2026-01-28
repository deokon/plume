<?php

namespace deokon\Plume\View\Components\Button;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use deokon\Plume\Theme;
use deokon\Plume\View\Components\Concerns\InteractsWithAttributes;
use deokon\Plume\View\Components\Concerns\HasStyles;

use deokon\Plume\View\Components\Concerns\HasIcon;

class Button extends Component
{
    use InteractsWithAttributes, HasStyles, HasIcon;

    public function __construct(
        public ?string $href = null,
        public ?string $method = null,
        ?string $icon = null,
        public bool $fullWidth = false,
        public ?string $size = null,
        public ?string $style = null,
        public ?string $shape = null,
        public ?string $confirm = null,
        public ?string $onSuccess = null,
        public ?string $onError = null,
    ) {
        $this->initializeIcon($icon);
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.button.index', [
            'component' => $this,
        ]);
    }

    public function classes(string $size = 'md', string $style = 'default', string $shape = 'default'): string
    {
        $base = 'inline-flex items-center justify-center whitespace-nowrap transition-all shrink-0 outline-none focus-visible:border-primary focus-visible:ring-primary/50 focus-visible:ring-[3px] dark:focus-visible:border-primary-200 dark:focus-visible:ring-primary-200/50 hover:cursor-pointer active:scale-95 disabled:pointer-events-none disabled:opacity-70 disabled:cursor-default disabled:saturate-30 [&_span.icon]:pointer-events-none [&_span.icon:not([class*=\'size-\'])]:size-8 [&_span.icon]:shrink-0 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive';

        if ($this->fullWidth) {
            $base .= ' w-full';
        }

        return $base . ' ' . Theme::button($style, $size, $shape);
    }
}
