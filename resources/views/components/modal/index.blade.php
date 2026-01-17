@use('deokon\Plume\Theme')
{{--
@component x-plume::modal
@description A dialog box or popup window that is displayed on top of the current page.
--}}
@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl',
    'title' => null,
    'footer' => null,
    'header' => null,
])

@php
    $maxWidthClass = Theme::modal($maxWidth);
    $enter = Theme::transitions('overlay-enter');
    $leave = Theme::transitions('overlay-leave');

    // Check if header slot is provided via $header variable (from x-slot:header) or prop
    $hasHeader = !empty($header) || isset($headerSlot);
    // Note: 'header' is a reserved slot name in some contexts? No.
    // Laravel provides $header variable if <x-slot:header> is used?
    // Actually, simple slots are passed as variables matching the name.

    // We need to check attributes/slots.
    // If <x-slot:header> is used, $header will be defined in the component scope if we add it to props or if we don't.
    // If we add it to props, it defaults to null. If slot is present, it might be passed?
    // Laravel component slots are usually available as $slotName.
@endphp

<div x-data="modal('{{ $name }}', @js($show), @js($attributes->has('focusable')))" x-on:keydown.escape.window="close()"
    x-on:keydown.tab.prevent="handleTab($event)" x-show="show" x-cloak
    {{ $attributes->merge(['class' => 'fixed inset-0 z-50 overflow-y-auto']) }}
    style="display: {{ $show ? 'block' : 'none' }};">
    <div x-show="show" x-cloak class="fixed inset-0 transform transition-all" x-on:click="close()"
        x-transition:enter="{{ $enter }}" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="{{ $leave }}"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-background-950/80 backdrop-blur-sm"></div>
    </div>

    <div x-show="show" x-cloak
        class="mb-6 flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div x-show="show" x-cloak
            class="relative w-full transform overflow-hidden rounded-xl border border-background-700/40 bg-background text-left shadow-xl transition-all dark:border-background-400/20 dark:bg-background-800 {{ $maxWidthClass }} sm:my-8 sm:w-full"
            x-transition:enter="{{ $enter }}"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="{{ $leave }}"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            @if (isset($header) && $header->isNotEmpty())
                <div class="flex flex-col space-y-1.5 p-6">
                    {{ $header }}
                </div>
            @elseif($title)
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-lg font-semibold leading-none tracking-tight">
                        {{ $title }}</h3>
                </div>
            @endif

            <div class="p-6 @if ((isset($header) && $header->isNotEmpty()) || $title) pt-0 @endif">
                {{ $slot }}
            </div>

            @if ($footer)
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 p-6 pt-0">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
