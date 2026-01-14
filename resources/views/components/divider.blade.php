@props(['label' => null])

<div {{ $attributes->merge(['class' => 'relative flex items-center py-5']) }}>
    <div class="flex-grow border-t border-background-700/40 dark:border-background-400/20"></div>
    <div class="mx-4 flex items-center gap-2 flex-shrink-0 text-foreground/30">
        @if($label)
            <span class="text-xs font-semibold uppercase tracking-widest">{{ $label }}</span>
        @endif
        <x-plume::logo size="size-4" />
    </div>
    <div class="flex-grow border-t border-background-700/40 dark:border-background-400/20"></div>
</div>
