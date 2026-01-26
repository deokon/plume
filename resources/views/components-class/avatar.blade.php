{{--
@component x-plume::avatar
@description A circular or square image element with text fallback and optional status indicator.
@prop string $src (Default: null) The URL of the avatar image.
@prop string $alt (Default: '') Accessibility text for the image.
@prop string $fallback (Default: '') Text to display if image fails to load (e.g., 'JD').
@prop string $size (Default: 'md') Size of the avatar: 'xs', 'sm', 'md', 'lg', 'xl'.
@prop string $status (Default: null) Color for the status indicator: 'success', 'warning', 'error', 'info'.
@prop string $shape (Default: 'round') Shape of the avatar: 'round' (circle) or 'default' (rounded-md).
@usage
<x-plume::avatar 
    src="https://example.com/user.jpg" 
    fallback="JD" 
    status="success" 
    size="lg" 
/>
--}}
@aware([
    'size' => null,
    'shape' => null,
])
@php
    [$resolvedSize, $resolvedStyle, $resolvedShape] = $component->resolveStyleProps($attributes, [
        'size' => $size,
        'shape' => $shape,
    ]);
    $cleanAttributes = $component->cleanAttributes($attributes);
@endphp
<div {{ $cleanAttributes->merge(['class' => $component->classes($resolvedSize, $resolvedShape)]) }}>
    <div
        class="flex h-full w-full items-center justify-center overflow-hidden @if ($resolvedShape === 'default') rounded-md @else rounded-full @endif bg-background-200 dark:bg-background-700">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}"
                class="aspect-square h-full w-full object-cover"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        @endif

        <div class="flex h-full w-full items-center justify-center font-medium uppercase"
            @if ($src) style="display: none;" @endif>
            {{ trim($slot) !== '' ? $slot : $fallback }}
        </div>

    </div>

    @if ($status)
        <span class="{{ $component->statusClasses($resolvedSize) }}"></span>
    @endif
</div>
