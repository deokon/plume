{{--
@component x-plume::alert
@prop {null} icon - Default: null
@prop {string} style - Default: info
@prop {boolean} closable - Default: false
@prop {null} autoclose - Default: null
@prop {null} title - Default: null
--}}
@props([
    'icon' => null,
    'style' => 'info',
    'closable' => false,
    'autoclose' => null,
    'title' => null,
])

@php
    $styleClass = match($style) {
        'success' => 'bg-primary-100 dark:bg-primary-500/30 text-primary-800 dark:text-primary-200 border-primary-300 dark:border-primary-500/50',
        'warning' => 'bg-destructive-50 dark:bg-destructive-300/30 text-secondary-800 dark:text-secondary-100 border-destructive-100 dark:border-destructive-300/50',
        'destructive' => 'bg-destructive-100 dark:bg-destructive-500/30 text-destructive-800 dark:text-destructive-200 border-destructive-300 dark:border-destructive-500/50',
        'info' => 'bg-secondary-100 dark:bg-secondary-500/30 text-secondary-800 dark:text-secondary-200 border-secondary-300 dark:border-secondary-500/50',
        default => ''
    };

    $iconStyleClass = match($style) {
        'success' => 'text-primary-500 dark:text-primary-300',
        'warning' => 'text-secondary-500 dark:text-secondary-300',
        'destructive' => 'text-destructive-500 dark:text-destructive-100',
        'info' => 'text-secondary-500 dark:text-secondary-300',
        default => ''
    };

    $icon = match($style) {
        'success' => $icon ?? 'icon-[fluent--checkmark-circle-24-regular]',
        'warning' => $icon ?? 'icon-[fluent--warning-24-regular]',
        'destructive' => $icon ?? 'icon-[fluent--error-circle-24-regular]',
        'info' => $icon ?? 'icon-[fluent--info-24-regular]',
        default => $icon
    };
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
            <x-plume::icon :i="$icon" class="mr-3 mt-0.5 {{ $iconStyleClass }}" />
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
