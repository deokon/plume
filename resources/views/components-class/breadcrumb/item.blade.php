{{--
@component x-plume::breadcrumb.item
@description An individual link or active label within a breadcrumb trail.
@prop string $href (Default: null) The destination URL for the link. If null, the item renders as a span.
@prop bool $active (Default: false) Whether the item represents the current page.
@usage
<x-plume::breadcrumb.item href="/dashboard">Dashboard</x-plume::breadcrumb.item>
<x-plume::breadcrumb.item active>Settings</x-plume::breadcrumb.item>
--}}
<li {{ $attributes->merge(['class' => 'inline-flex items-center']) }}>
    @if ($href && !$active)
        <x-plume::button :href="$href" style="minor" size="sm" class="-mx-1">
            {{ $slot }}
        </x-plume::button>
    @else
        <span
            class="px-2 py-1 text-sm font-medium text-foreground dark:text-background-200 {{ $active ? '' : 'opacity-50' }}"
            aria-current="{{ $active ? 'page' : 'false' }}">
            {{ $slot }}
        </span>
    @endif
</li>
