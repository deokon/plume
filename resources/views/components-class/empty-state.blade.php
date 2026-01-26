{{--
@component x-plume::empty-state
@description A placeholder component to show when a list, table, or page has no data.
@prop string $title (Default: 'No results found') The main heading text.
@prop string $description (Default: null) Helpful text or instructions for the user.
@prop string $icon (Default: 'icon-[fluent--search-info-24-regular]') Iconify icon name.
@usage
<x-plume::empty-state 
    title="No items in cart" 
    description="Your shopping cart is currently empty. Start adding some products!"
    icon="icon-[fluent--cart-24-regular]"
>
    <x-plume::button href="/shop">Browse Products</x-plume::button>
</x-plume::empty-state>
--}}
<div
    {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center p-8 text-center w-full']) }}>
    <div class="mb-4 rounded-full bg-background-200 dark:bg-background-700 p-4">
        <x-plume::icon :i="$icon"
            class="size-8 text-foreground/40 dark:text-background-400/60" />
    </div>
    <h3 class="text-lg font-bold dark:text-background-200">{{ $title }}</h3>
    @if ($description)
        <p class="mt-1 text-sm text-foreground/50 dark:text-background-400">{{ $description }}</p>
    @endif
    @if ($slot->isNotEmpty())
        <div class="mt-6">
            {{ $slot }}
        </div>
    @endif
</div>
