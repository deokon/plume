{{--
@component x-plume::accordion
@description Collapsible content panels for saving vertical space.
@prop bool $alwaysOpen (Default: false) Whether multiple items can be open at once.
@prop string $onToggle (Default: null) AlpineJS expression or function to call when an item is toggled.
@usage
<x-plume::accordion>
    <x-plume::accordion.item title="Item 1">
        Content 1
    </x-plume::accordion.item>
</x-plume::accordion>
--}}
<div x-data="accordion({{ $alwaysOpen ? 'true' : 'false' }}, { onToggle: {{ Js::from($onToggle) }} })"
    {{ $attributes->merge(['class' => 'divide-y divide-background-700/40 dark:divide-background-400/20 border-y border-background-700/40 dark:border-background-400/20 w-full']) }}>
    {{ $slot }}
</div>
