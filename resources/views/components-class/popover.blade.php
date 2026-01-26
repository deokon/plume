{{--
@component x-plume::popover
@description Displays rich content in a small overlay, triggered by clicking a button or element.
@prop string $trigger (Default: null) The text or slot content for the popover trigger.
@prop string $position (Default: 'bottom') The primary position: 'top', 'bottom', 'left', 'right'.
@prop string $align (Default: 'center') Alignment relative to position: 'start', 'center', 'end'.
@usage
<x-plume::popover trigger="Help Info" position="top">
    <div class="space-y-2">
        <h4 class="font-bold">Information</h4>
        <p class="text-sm">This is a helpful popover with some detailed explanation.</p>
    </div>
</x-plume::popover>
--}}
@php $popover = $component; @endphp
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
        @if (isset($trigger) && $trigger instanceof \Illuminate\View\ComponentSlot)
            {{ $trigger }}
        @elseif (isset($trigger))
            <x-plume::button type="button" style="outline" ::class="{ 'bg-background-100 dark:bg-background-700': open }">
                {{ $trigger }}
            </x-plume::button>
        @endif
    </div>

    <div x-show="open" x-cloak x-transition:enter="{{ $enter }}"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="{{ $leave }}" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 w-72 rounded-md border border-background-700/40 bg-background p-4 shadow-md outline-none dark:border-background-400/20 dark:bg-background-800 text-foreground"
        style="display: none; top: calc(100% + 0.5rem); left: 50%; transform: translateX(-50%);">
        {{ $slot }}
    </div>
</div>
