{{--
@component x-plume::figure
@description Enhanced image component with captions, aspect ratio control, and support for modern image formats.
@prop string $src (Default: null)
@prop string $alt (Default: '')
@prop string $caption (Default: null)
@prop string $aspect (Default: null)
@prop string $srcset (Default: null)
@prop string $sizes (Default: null)
--}}
<figure
    {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg bg-background-100 dark:bg-background-900/50']) }}>
    <div @class(['relative w-full', $aspectClass])>
        @if (isset($sources) && $sources->isNotEmpty())
            <picture>
                {{ $sources }}
                <img src="{{ $src }}" alt="{{ $alt }}"
                    @if ($srcset) srcset="{{ $srcset }}" @endif
                    @if ($sizes) sizes="{{ $sizes }}" @endif
                    class="h-full w-full object-cover" loading="lazy">
            </picture>
        @else
            <img src="{{ $src }}" alt="{{ $alt }}"
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