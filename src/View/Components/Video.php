<?php

namespace deokon\Plume\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Closure;
use Illuminate\Support\Str;

use deokon\Plume\View\Components\Concerns\HasMediaAspectRatio;

class Video extends Component
{
    use HasMediaAspectRatio;

    public bool $isEmbed;
    public string $embedSrc;

    public function __construct(
        public string $src,
        public ?string $poster = null,
        public bool $autoplay = false,
        public bool $controls = true,
        public bool $loop = false,
        public bool $muted = false,
        public string $aspect = 'video',
        public ?string $onPlay = null,
        public ?string $onPause = null,
        public ?string $onEnded = null,
    ) {
        $this->resolveEmbed();
    }

    public function render(): View|Closure|string
    {
        return view('plume::components-class.video', [
            'component' => $this,
            'aspectClass' => $this->resolveAspectRatio($this->aspect, 'aspect-video'),
        ]);
    }

    protected function resolveEmbed(): void
    {
        $isYoutube = Str::contains($this->src, ['youtube.com', 'youtu.be']);
        $isVimeo = Str::contains($this->src, ['vimeo.com']);
        $this->isEmbed = $isYoutube || $isVimeo;

        $this->embedSrc = $this->src;
        if ($isYoutube) {
            if (Str::contains($this->src, 'watch?v=')) {
                parse_str(parse_url($this->src, PHP_URL_QUERY), $args);
                $id = $args['v'] ?? null;
                $this->embedSrc = "https://www.youtube.com/embed/$id";
            } elseif (Str::contains($this->src, 'youtu.be/')) {
                $parts = explode('/', $this->src);
                $id = end($parts);
                $this->embedSrc = "https://www.youtube.com/embed/$id";
            }
        } elseif ($isVimeo) {
            if (preg_match('/vimeo\.com\/(\d+)/', $this->src, $matches)) {
                $id = $matches[1];
                $this->embedSrc = "https://player.vimeo.com/video/$id";
            }
        }
    }
}
