{{--
@component x-plume::divider
@description Visually separates content sections with an optional label.
--}}
@props(['label' => null])

<div {{ $attributes->merge(['class' => 'relative flex items-center py-5']) }}>
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
