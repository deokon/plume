@use('deokon\Plume\Theme')
{{--
@component x-plume::badge
@description Displays a badge or a component that looks like a badge.
@usage
<x-plume::badge style="secondary">
    New Feature
</x-plume::badge>
--}}
@props([
    'style' => 'default',
])

@php
    $styleClass = Theme::badge($style);

    $class =
        ($attributes->get('class') ?? '') .
        ' inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2' .
        ' ' .
        $styleClass;
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</div>
