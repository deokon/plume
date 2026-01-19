{{--
@component x-plume::avatar
@description An image element with a fallback for representing the user.
--}}
@aware([
    'size' => null,
    'shape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, ['size' => $size, 'shape' => $shape]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<div
    {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedShape)]) }}>
    <div
        class="flex h-full w-full items-center justify-center overflow-hidden @if ($resolvedShape === 'default') rounded-md @else rounded-full @endif bg-background-200 dark:bg-background-700">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}"
                class="aspect-square h-full w-full object-cover"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        @endif

        <div class="flex h-full w-full items-center justify-center font-medium uppercase"
            @if ($src) style="display: none;" @endif>
            {{ $fallback }}
        </div>
    </div>

    @if ($status)
        <span class="{{ $component->statusClasses($resolvedSize) }}"></span>
    @endif
</div>
