{{--
@component x-plume::kbd
@description Displays keyboard input.
--}}
<kbd
    {{ $attributes->merge(['class' => 'pointer-events-none inline-flex items-center select-none rounded border border-background-700/40 bg-background-100 font-mono font-medium text-foreground/60 dark:bg-background-800 dark:border-background-400/20 ' . $styleClass]) }}>
    {{ $slot }}
</kbd>