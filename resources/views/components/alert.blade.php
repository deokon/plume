@use('deokon\Plume\Theme')
{{--
@component x-plume::alert
@description Displays a callout for user attention.
@usage
<x-plume::alert style="success" title="Success" closable autoclose="3000">
    Your changes have been saved.
</x-plume::alert>
--}}
@props([
    'icon' => null,
    'style' => 'info',
    'closable' => false,
    'autoclose' => null,
    'title' => null,
])

@php
    $theme = Theme::alert($style);
    $styleClass = $theme['container'];
    $iconStyleClass = $theme['icon'];
    $icon = $icon ?? $theme['icon_name'];
@endphp

<div 
    x-data="{ open: true }" 
    x-show="open" 
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    @if($autoclose)
        x-init="setTimeout(() => open = false, {{ $autoclose }})"
    @endif
>
    <div {{ $attributes->merge(['class' => 'flex items-start p-4 border-l-[3px] rounded-md ' . $styleClass]) }}>
        @if($icon)
            <x-plume::icon :i="$icon" class="mr-3 mt-0.5 shrink-0 {{ $iconStyleClass }}" />
        @endif
        <div class="grow">
            @if($title)
                <h3 class="font-bold">{{ $title }}</h3>
            @endif
            {{ $slot }}
        </div>
        @if($closable)
            <x-plume::button
                size="sm"
                style="ghost"
                class="ml-auto -mr-1.5 -mt-1.5 p-1"
                aria-label="Close"
                x-on:click="open = false"
            >
                <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="text-lg" />
            </x-plume::button>
        @endif
    </div>
</div>