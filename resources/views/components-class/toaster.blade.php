{{--
@component x-plume::toaster
@description A container for temporary notification messages (Toasts). Triggered via global magic helpers.
@prop string $position (Default: 'bottom-right') Position of the toast stack: 'top-left', 'top-right', 'top-center', 'bottom-left', 'bottom-right', 'bottom-center'.
@usage
{{-- Place once in your main layout file --}}
<x-plume::toaster position="top-right" />

{{-- Trigger from anywhere using global helpers --}}
<button @click="$success('Profile Saved!')">Save</button>
<button @click="$error('Action failed')">Delete</button>
<button @click="$toast('New message', { type: 'info', timeout: 3000 })">Notify</button>
--}}
<div class="fixed {{ $positionClasses }} z-50 flex flex-col gap-2 p-4 sm:p-6 max-h-screen overflow-hidden pointer-events-none"
    x-data>
    <template
        x-for="toast in $store.toasts.items"
        :key="toast.id">
        <div x-transition:enter="{{ $enter }}" x-transition:enter-start="{{ $enterStart }}"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="{{ $leave }}" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="flex w-full max-w-sm overflow-hidden rounded-lg border border-background-700/40 bg-background shadow-lg dark:border-background-400/20 dark:bg-background-800 pointer-events-auto">
            <template x-if="!toast.type || toast.type === 'info'">
                <x-plume::alert style="info" :closable="true"
                    onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'success'">
                <x-plume::alert style="success" :closable="true"
                    onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'error'">
                <x-plume::alert style="error" :closable="true"
                    onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
            <template x-if="toast.type === 'warning'">
                <x-plume::alert style="warning" :closable="true"
                    onClose="$store.toasts.remove(toast.id)">
                    <x-slot:title>
                        <span x-text="toast.title"></span>
                    </x-slot:title>
                    <span x-text="toast.message"></span>
                </x-plume::alert>
            </template>
        </div>
    </template>
</div>
