{{--
@component x-plume::progress
@prop {number} value - Default: 0
@prop {number} max - Default: 100
@prop {string} style - Default: default
@prop {null} title - Default: null
@prop {null} model - Default: null
@prop {string} display - Default: percentage
--}}
@props([
    'value' => 0,
    'max' => 100,
    'style' => 'default',
    'title' => null,
    'model' => null,
    'display' => 'percentage', // 'percentage', 'number', 'outof', 'none'
])

@php
    $percentage = $model ? null : min(100, max(0, ($value / $max) * 100));

    $styleClass = match($style) {
        'secondary' => 'bg-secondary',
        'destructive' => 'bg-destructive',
        'success' => 'bg-primary',
        default => 'bg-primary',
    };
@endphp

<div {{ $attributes->merge(['class' => 'w-full space-y-2']) }}>
    @if($title || $display !== 'none')
        <div class="flex justify-between text-sm font-medium">
            @if($title)
                <span>{{ $title }}</span>
            @endif

            @if($display !== 'none')
                @if($model)
                    <span x-text="{!! match($display) {
                        'number' => $model,
                        'outof' => "$model + ' / ' + $max",
                        default => "Math.round(Math.min($max, Math.max(0, $model)) / $max * 100) + '%'"
                    } !!}"></span>
                @else
                    <span>{!! match($display) {
                        'number' => $value,
                        'outof' => "$value / $max",
                        default => round($percentage) . '%'
                    } !!}</span>
                @endif
            @endif
        </div>
    @endif

    <div class="relative h-4 w-full overflow-hidden rounded-full bg-background-200 dark:bg-background-700">
        <div
            class="h-full w-full flex-1 transition-all {{ $styleClass }}"
            @if($model)
                :style="`transform: translateX(-${100 - (Math.min({{ $max }}, Math.max(0, {{ $model }})) / {{ $max }} * 100)}%)`"
            @else
                style="transform: translateX(-{{ 100 - $percentage }}%)"
            @endif
        ></div>
    </div>
</div>
