{{--
@component x-plume::accordion.item
@description An individual collapsible item within an accordion.
--}}
<div x-data="accordionItem('{{ $id }}', {{ $open ? 'true' : 'false' }})" x-init="if (localOpen && !alwaysOpen) active = id" {{ $attributes->merge(['class' => 'group']) }}>
    <h3>
        <button type="button"
            class="flex w-full items-center justify-between py-4 text-left font-medium transition-colors hover:text-primary focus:outline-none"
            @click="isOpen = !isOpen" :aria-expanded="isOpen">
            <span>{{ $title }}</span>
            <x-plume::icon i="icon-[fluent--chevron-down-24-regular]"
                class="size-4 transition-transform duration-200" ::class="isOpen ? 'rotate-180' : ''" />
        </button>
    </h3>
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="pb-4 text-foreground/70 dark:text-background-400">
        {{ $slot }}
    </div>
</div>