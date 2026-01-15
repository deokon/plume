{{--
@component x-plume::spinner
@description A standalone loading indicator.
@prop {string} size - Options: sm, md, lg, xl. (Default: md)
@prop {string} style - Options: default, secondary, destructive, white. (Default: default)
--}}
@props([
    'size' => 'md',
    'style' => 'default',
])

@php
    $sizeClasses = match($size) {
        'sm' => 'size-4',
        'lg' => 'size-8',
        'xl' => 'size-12',
        // 'md'
        default => 'size-6',
    };

    $styleClass = match($style) {
        'secondary' => 'text-secondary',
        'destructive' => 'text-destructive',
        'white' => 'text-white',
        // 'default'
        default => 'text-primary',
    };
@endphp

@if($style === 'custom')
    <div {{ $attributes->merge(['class' => 'inline-block animate-pulse ' . $sizeClasses . ' ' . $styleClass]) }} role="status" aria-label="loading">
        {{ $slot }}
        <span class="sr-only">Loading...</span>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'inline-block animate-spin rounded-full border-2 border-current border-t-transparent ' . $sizeClasses . ' ' . $styleClass]) }} role="status" aria-label="loading">
        <span class="sr-only">Loading...</span>
    </div>
@endif