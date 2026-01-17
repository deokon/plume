{{--
@component x-plume::popover
@description Displays rich content in a portal, triggered by a button.
--}}
@props([
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
    {{ $slot }}
</div>
