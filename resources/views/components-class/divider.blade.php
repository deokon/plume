{{--
@component x-plume::divider
@description A horizontal rule used to visually separate content sections, with optional text or icon labels.
@prop string $label (Default: null) Text label to display in the center of the divider.
@usage
<x-plume::divider />
<x-plume::divider label="OR" />
<x-plume::divider>
    <x-plume::icon i="icon-[fluent--star-24-regular]" />
</x-plume::divider>
--}}
<div {{ $attributes->merge(['class' => 'relative flex items-center py-5 w-full']) }}>
    <div class="flex-grow border-t border-background-700/40 dark:border-background-400/20"></div>
    @if ($label || $slot->isNotEmpty())
        <div
            class="mx-4 flex items-center gap-2 shrink-0 text-foreground/30 dark:text-background-400/50">
            @if ($label)
                <span
                    class="text-xs font-semibold uppercase tracking-widest">{{ $label }}</span>
            @endif
            {{ $slot }}
        </div>
    @endif
    <div class="grow border-t border-background-700/40 dark:border-background-400/20"></div>
</div>
