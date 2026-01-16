{{--
@component x-plume::toaster
@description A succinct message that is displayed temporarily.
--}}
@props([
    'position' => 'bottom-right', // top-left, top-right, bottom-left, bottom-right
])

@php
    $positionClasses = match($position) {
        'top-left' => 'top-0 left-0',
        'top-right' => 'top-0 right-0',
        'bottom-left' => 'bottom-0 left-0',
        'bottom-right' => 'bottom-0 right-0',
        default => 'bottom-0 right-0',
    };
@endphp

<div
    class="fixed {{ $positionClasses }} z-50 flex flex-col gap-2 p-4 sm:p-6 max-h-screen overflow-hidden"
    x-data
>
    <template x-for="toast in $store.toasts.items" :key="toast.id">
        <div
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex w-full max-w-sm overflow-hidden rounded-lg border border-background-700/40 bg-background shadow-lg dark:border-background-400/20 dark:bg-background-800"
        >
            <div class="flex-1 p-4">
                <div class="flex items-start">
                    <div class="shrink-0" x-show="toast.type">
                        <template x-if="toast.type === 'success'">
                            <x-plume::icon i="icon-[fluent--checkmark-circle-24-regular]" class="size-6 text-primary" />
                        </template>
                        <template x-if="toast.type === 'error'">
                            <x-plume::icon i="icon-[fluent--error-circle-24-regular]" class="size-6 text-destructive" />
                        </template>
                        <template x-if="toast.type === 'info'">
                            <x-plume::icon i="icon-[fluent--info-24-regular]" class="size-6 text-foreground/50 dark:text-background-400" />
                        </template>
                        <template x-if="toast.type === 'warning'">
                            <x-plume::icon i="icon-[fluent--warning-24-regular]" class="size-6 text-warning" />
                        </template>
                    </div>
                    <div :class="toast.type ? 'ml-3' : ''" class="flex-1">
                        <p x-show="toast.title" class="text-sm font-bold" x-text="toast.title"></p>
                        <p class="mt-1 text-sm text-foreground/50 dark:text-background-400" x-text="toast.message"></p>
                    </div>
                    <div class="ml-4 flex shrink-0">
                        <button
                            type="button"
                            class="inline-flex rounded-md text-foreground/50 dark:text-background-400 hover:text-foreground dark:hover:text-background-200 focus:outline-none"
                            x-on:click="$store.toasts.remove(toast.id)"
                        >
                            <x-plume::icon i="icon-[fluent--dismiss-24-regular]" class="size-5" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>