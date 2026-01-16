{{--
@component x-plume::alert-dialog
@description Modal dialog specifically designed for alerting users to important information or actions.
--}}
@props([
    'name',
    'show' => false,
    'maxWidth' => 'md',
])

@php
    $maxWidthClass = match($maxWidth) {
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        default => 'sm:max-w-md',
    };
@endphp

<div
    x-data="modal('{{ $name }}', @js($show), true)"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="handleTab($event)"
    x-show="show"
    role="alertdialog"
    aria-modal="true"
    aria-labelledby="{{ $name }}-title"
    aria-describedby="{{ $name }}-description"
    class="fixed inset-0 z-50 overflow-y-auto"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    {{-- Backdrop --}}
    <div
        x-show="show"
        class="fixed inset-0 transform transition-all"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-background/80 backdrop-blur-sm"></div>
    </div>

    {{-- Dialog --}}
    <div
        x-show="show"
        class="mb-6 flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
    >
        <div
            x-show="show"
            class="relative w-full transform overflow-hidden rounded-xl border border-background-700/40 bg-background text-left shadow-xl transition-all dark:border-background-400/20 dark:bg-background-800 {{ $maxWidthClass }} sm:my-8 sm:w-full p-6 space-y-4"
            x-transition:enter="ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            @click.outside="show = false"
        >
            {{ $slot }}
        </div>
    </div>
</div>
