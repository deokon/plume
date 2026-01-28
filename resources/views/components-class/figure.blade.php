{{--
@component x-plume::figure
@description Enhanced image component with captions, aspect ratio control, and support for modern image formats.
@prop string $src (Default: null) The image source URL.
@prop string $alt (Default: '') Alternative text for accessibility.
@prop string $caption (Default: null) Text caption displayed below the image.
@prop string $aspect (Default: null) Desired aspect ratio: 'square' (1:1), 'video' (16:9), 'standard' (4:3), 'portrait' (3:4), 'cinema' (21:9), 'vertical' (9:16). Supports both '4/3' and '4:3' notations.
@prop string $srcset (Default: null) Responsive image sources.
@prop string $sizes (Default: null) Responsive image sizes.
--}}
<figure
    {{ $attributes->whereDoesntStartWith(['x-', ':', '@', 'x-bind'])->merge(['class' => 'overflow-hidden rounded-lg bg-background-100 dark:bg-background-900/50']) }}>
    <div @class(['relative w-full', $aspectClass])>
        @if (isset($sources) && $sources->isNotEmpty())
            <picture>
                {{ $sources }}
                <img {{ $attributes->whereStartsWith(['x-', ':', '@', 'x-bind']) }}
                    src="{{ $src }}" alt="{{ $alt }}"
                    @if ($srcset) srcset="{{ $srcset }}" @endif
                    @if ($sizes) sizes="{{ $sizes }}" @endif
                    class="h-full w-full object-cover" loading="lazy">
            </picture>
        @else
            <img {{ $attributes->whereStartsWith(['x-', ':', '@', 'x-bind']) }}
                src="{{ $src }}" alt="{{ $alt }}"
                @if ($srcset) srcset="{{ $srcset }}" @endif
                @if ($sizes) sizes="{{ $sizes }}" @endif
                class="h-full w-full object-cover" loading="lazy">
        @endif
    </div>
    @if ($caption || $slot->isNotEmpty())
        <figcaption class="p-3 text-sm text-foreground/60 dark:text-background-400">
            {{ $caption ?? $slot }}
        </figcaption>
    @endif
</figure>
