{{--
@component x-plume::toaster
@description A succinct message that is displayed temporarily.
@prop string $position (Default: 'bottom-right')
--}}
<div class="fixed {{ $positionClasses }} z-50 flex flex-col gap-2 p-4 sm:p-6 max-h-screen overflow-hidden pointer-events-none"
    x-data>
    <template
        x-for="toast in $store.toasts.items.filter(t => (t.position || 'bottom-right') === '{{ $position }}')"
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