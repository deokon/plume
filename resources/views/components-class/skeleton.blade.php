{{--
@component x-plume::skeleton
@description A placeholder for content that is loading.
@prop string $shape (Default: 'rect')
@prop string $animation (Default: 'pulse')
--}}
<div {{ $attributes->class($classes) }}>
    @if ($slot->isNotEmpty())
        <div class="opacity-30 dark:opacity-20 flex items-center justify-center">
            {{ $slot }}
        </div>
    @endif
</div>
