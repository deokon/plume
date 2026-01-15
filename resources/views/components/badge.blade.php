{{--
@component x-plume::badge
@description Displays a badge or a component that looks like a badge.
@prop {string} style - Options: default, secondary, destructive, outline, success. (Default: default)
--}}
@props([
    'style' => 'default',
])

@php
    $styleClass = match($style) {
        'secondary' => 'bg-secondary/20 text-secondary-foreground border-secondary/30',
        'destructive' => 'bg-destructive/60 text-destructive-foreground border-destructive/30',
        'outline' => 'border text-foreground dark:text-background-200',
        'success' => 'bg-primary/80 text-primary-foreground border-primary/30',
        // 'default'
        default => 'bg-primary text-primary-foreground border-transparent',
    };

    $class = ($attributes->get('class') ?? '')
        .' inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2'
        .' ' . $styleClass;
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
