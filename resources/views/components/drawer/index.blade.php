{{--
@component x-plume::drawer
@description A panel that slides in from the edge of the screen.
--}}
@props([
    'name',
    'show' => false,
    'side' => 'right',
])

@php
    $sideClasses = match($side) {
        'left' => 'left-0 h-full w-full max-w-sm border-r',
        'top' => 'top-0 w-full h-auto max-h-[80vh] border-b',
        'bottom' => 'bottom-0 w-full h-auto max-h-[80vh] border-t',
        // 'right'
        default => 'right-0 h-full w-full max-w-sm border-l',
    };

    $transitionClasses = match($side) {
        'left' => 'x-transition:enter-start="-translate-x-full" x-transition:leave-end="-translate-x-full"',
        'top' => 'x-transition:enter-start="-translate-y-full" x-transition:leave-end="-translate-y-full"',
        'bottom' => 'x-transition:enter-start="translate-y-full" x-transition:leave-end="translate-y-full"',
        default => 'x-transition:enter-start="translate-x-full" x-transition:leave-end="translate-x-full"',
    };
@endphp

<div
    x-data="{ 
        show: @js($show),
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-drawer.window="if ($event.detail === '{{ $name }}') show = true"
    x-on:close-drawer.window="if ($event.detail === '{{ $name }}') show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 z-50 overflow-hidden"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-background/80 backdrop-blur-sm"></div>
    </div>

    <div
        x-show="show"
        class="fixed {{ $sideClasses }} transform bg-background shadow-xl transition-all duration-300 ease-in-out dark:bg-background-800 border-background-600 dark:border-background-200"
        x-transition:enter="transform transition ease-in-out duration-300"
        {{ $transitionClasses }}
        x-transition:leave="transform transition ease-in-out duration-300"
    >
        <div class="flex h-full flex-col">
            {{ $slot }}
        </div>
    </div>
</div>
