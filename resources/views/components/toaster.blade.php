{{--
@component x-plume::toaster
--}}
<div
    class="fixed bottom-0 right-0 z-50 flex flex-col gap-2 p-4 sm:p-6"
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
