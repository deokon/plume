{{--
@component x-plume::avatar
@description An image element with a fallback for representing the user.
--}}
@props([
    'src' => null,
    'alt' => '',
    'fallback' => '',
    'size' => 'md',
])

@php
    $sizeClasses = match($size) {
        'xs' => 'size-6 text-[10px]',
        'sm' => 'size-8 text-xs',
        'lg' => 'size-12 text-lg',
        'xl' => 'size-16 text-xl',
        // 'md'
        default => 'size-10 text-base',
    };
@endphp

<div {{ $attributes->merge(['class' => 'relative flex shrink-0 overflow-hidden rounded-full bg-background-200 dark:bg-background-700 ' . $sizeClasses]) }}>
    @if($src)
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            class="aspect-square h-full w-full object-cover"
            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
        >
    @endif

    <div
        class="flex h-full w-full items-center justify-center rounded-full font-medium uppercase"
        @if($src) style="display: none;" @endif
    >
        {{ $fallback }}
    </div>
</div>
