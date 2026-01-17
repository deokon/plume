{{--
@component x-plume::popover
@description Displays rich content in a portal, triggered by a button.
--}}
@props([
    'trigger' => null,
    'position' => 'bottom', // top, bottom, left, right
    'align' => 'center', // start, center, end
])

<div x-data="{
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    }
}" class="relative inline-block" @keydown.escape.window="close()"
    @click.outside="close()">
    <div @click="toggle" class="inline-flex cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 w-72 rounded-md border border-background-200 bg-background p-4 shadow-md outline-none dark:border-background-800 dark:bg-background-800 text-foreground"
        style="display: none; top: calc(100% + 0.5rem); left: 50%; transform: translateX(-50%);">
        {{ $slot }}
    </div>
</div>
