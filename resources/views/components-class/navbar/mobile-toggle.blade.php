{{--
@component x-plume::navbar.mobile-toggle
@description Toggle button for the mobile menu.
--}}
<div {{ $attributes->merge(['class' => 'flex items-center sm:hidden']) }}>
    <button @click="mobileOpen = !mobileOpen" type="button"
        class="inline-flex items-center justify-center rounded-md p-2 text-foreground/50 hover:bg-background-100 hover:text-foreground/80 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary dark:hover:bg-background-800"
        aria-controls="mobile-menu" :aria-expanded="mobileOpen">
        <span class="sr-only">Open main menu</span>
        <x-plume::icon x-show="!mobileOpen" :i="$icon ?? 'icon-[fluent--line-horizontal-3-20-regular]'" class="size-6" />
        <x-plume::icon x-show="mobileOpen" i="icon-[fluent--dismiss-24-regular]" x-cloak
            class="size-6" />
    </button>
</div>
