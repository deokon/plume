{{--
@component x-plume::accordion
@description Collapsible content panels for saving vertical space.
@usage
<x-plume::accordion>
    <x-plume::accordion.item title="Heading">
        Content...
    </x-plume::accordion.item>
</x-plume::accordion>
--}}
@props([
    'alwaysOpen' => false,
])

<div 
    x-data="{ 
        active: null,
        alwaysOpen: {{ $alwaysOpen ? 'true' : 'false' }},
        select(id) {
            if (this.alwaysOpen) return;
            this.active = (this.active === id) ? null : id;
        }
    }" 
    {{ $attributes->merge(['class' => 'divide-y divide-background-700/40 dark:divide-background-400/20 border-y border-background-700/40 dark:border-background-400/20']) }}
>
    {{ $slot }}
</div>