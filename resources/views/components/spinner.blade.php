{{--
@component x-plume::spinner
@description A standalone loading indicator.
--}}
@props([
    'size' => 'md',
    'style' => 'primary',
])

@php
    $themeClasses = \deokon\Plume\Theme::spinner($size, $style);
@endphp

@if($style === 'custom')
    <div {{ $attributes->merge(['class' => 'inline-block animate-pulse ' . $themeClasses]) }} role="status" aria-label="loading">
        {{ $slot }}
        <span class="sr-only">Loading...</span>
    </div>
@else
    <div {{ $attributes->merge(['class' => 'inline-block animate-spin rounded-full border-2 border-current border-t-transparent ' . $themeClasses]) }} role="status" aria-label="loading">
        <span class="sr-only">Loading...</span>
    </div>
@endif
