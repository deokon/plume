{{--
@component x-plume::skeleton
@description A placeholder component to indicate loading state for specific shapes or content blocks.
@prop string $shape (Default: 'rect') The shape of the skeleton: 'rect', 'circle', 'text'.
@prop string $animation (Default: 'pulse') The animation style: 'pulse', 'wave', 'none'.
@usage
{{-- Profile Placeholder --}}
<div class="flex items-center gap-4">
    <x-plume::skeleton shape="circle" class="size-12" />
    <div class="space-y-2">
        <x-plume::skeleton shape="text" class="w-24 h-4" />
        <x-plume::skeleton shape="text" class="w-32 h-3" />
    </div>
</div>
--}}
<div {{ $attributes->class($classes) }}>
    @if ($slot->isNotEmpty())
        <div class="opacity-30 dark:opacity-20 flex items-center justify-center">
            {{ $slot }}
        </div>
    @endif
</div>
