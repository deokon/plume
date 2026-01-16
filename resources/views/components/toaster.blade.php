{{--
@component x-plume::toaster
@description A succinct message that is displayed temporarily.
--}}
@use('deokon\Plume\Theme')
@props([
    'position' => 'bottom-right', // top-left, top-center, top-right, bottom-left, bottom-center, bottom-right
])

@php
    $positionClasses = match($position) {
        'top-left' => 'top-0 left-0 items-start',
        'top-center' => 'top-0 left-1/2 -translate-x-1/2 items-center',
        'top-right' => 'top-0 right-0 items-end',
        'bottom-left' => 'bottom-0 left-0 items-start',
        'bottom-center' => 'bottom-0 left-1/2 -translate-x-1/2 items-center',
        'bottom-right' => 'bottom-0 right-0 items-end',
        default => 'bottom-0 right-0 items-end',
    };

    $enterStart = 'translate-y-2 opacity-0';
    if (str_contains($position, 'center')) {
        // Center: keep vertical slide (translate-y-2), no horizontal
    } elseif (str_contains($position, 'right')) {
        // Right: Reset Y, slide from right
        $enterStart .= ' sm:translate-y-0 sm:translate-x-2';
    } else {
        // Left: Reset Y, slide from left
        $enterStart .= ' sm:translate-y-0 sm:-translate-x-2';
    }

    $enter = Theme::transitions('overlay-enter');
    $leave = Theme::transitions('overlay-leave');
@endphp

<div
    class="fixed {{ $positionClasses }} z-50 flex flex-col gap-2 p-4 sm:p-6 max-h-screen overflow-hidden pointer-events-none"
    x-data
>
    <template x-for="toast in $store.toasts.items.filter(t => (t.position || 'bottom-right') === '{{ $position }}')" :key="toast.id">
        <div
            x-transition:enter="{{ $enter }}"
            x-transition:enter-start="{{ $enterStart }}"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="{{ $leave }}"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex w-full max-w-sm overflow-hidden rounded-lg border border-background-700/40 bg-background shadow-lg dark:border-background-400/20 dark:bg-background-800 pointer-events-auto"
        >
            <template x-if="!toast.type || toast.type === 'info'">
                <x-plume::alert style="info" :closable="true" onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'success'">
                <x-plume::alert style="success" :closable="true" onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'error'">
                <x-plume::alert style="destructive" :closable="true" onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'warning'">
                <x-plume::alert style="warning" :closable="true" onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
        </div>
    </template>
</div>
