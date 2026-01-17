@use('deokon\Plume\Theme')
{{--
@component x-plume::modal
@description A dialog box or popup window that is displayed on top of the current page.
--}}
@aware([
    'name',
    'show' => false,
    'maxWidth' => '2xl',
    'title' => null,
    'footer' => null,
])

@php
    $maxWidthClass = Theme::modal($maxWidth);
    $enter = Theme::transitions('overlay-enter');
    $leave = Theme::transitions('overlay-leave');
@endphp

<div
    x-data="modal('{{ $name }}', @js($show), @js($attributes->has('focusable')))"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="handleTab($event)"
    x-show="show"
    {{ $attributes->merge(['class' => 'fixed inset-0 z-50 overflow-y-auto']) }}
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-on:click="show = false"
        x-transition:enter="{{ $enter }}"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="{{ $leave }}"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-background-950/80 backdrop-blur-sm"></div>
    </div>

    <div
        x-show="show"
        class="mb-6 flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
    >
        <div
            x-show="show"
            class="relative w-full transform overflow-hidden rounded-xl border border-background-700/40 bg-background text-left shadow-xl transition-all dark:border-background-400/20 dark:bg-background-800 {{ $maxWidthClass }} sm:my-8 sm:w-full"
            x-transition:enter="{{ $enter }}"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="{{ $leave }}"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
        @if($title)
            <div class="flex flex-col space-y-1.5 p-6">
                <h3 class="text-lg font-semibold leading-none tracking-tight">{{ $title }}</h3>
            </div>
        @endif
        <div class="p-6 pt-0">
            {{ $slot }}
        </div>
        @if($footer)
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2 p-6 pt-0">
                {{ $footer}}
            </div>
        @endif
    </div>
</div>
