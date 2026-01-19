{{--
@component x-plume::avatar
@description An image element with a fallback for representing the user.
--}}
<div {{ $attributes->merge(['class' => 'relative inline-flex shrink-0 ' . $sizeClasses]) }}>
    <div
        class="flex h-full w-full items-center justify-center overflow-hidden rounded-full bg-background-200 dark:bg-background-700">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}"
                class="aspect-square h-full w-full object-cover"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
        @endif

        <div class="flex h-full w-full items-center justify-center rounded-full font-medium uppercase"
            @if ($src) style="display: none;" @endif>
            {{ $fallback }}
        </div>
    </div>

    @if ($status)
        <span
            class="absolute bottom-0 right-0 block rounded-full ring-2 ring-background dark:ring-background-800 {{ $statusSizeClasses }} {{ $statusColorClasses }}"></span>
    @endif
</div>