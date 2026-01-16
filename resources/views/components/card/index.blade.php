{{--
@component x-plume::card
@description Displays a card with header, content, and footer.
@usage
<x-plume::card>
    <x-plume::card.header>
        <x-plume::card.title>Title</x-plume::card.title>
        <x-plume::card.description>Description</x-plume::card.description>
    </x-plume::card.header>
    <x-plume::card.content>Content</x-plume::card.content>
    <x-plume::card.footer>Footer</x-plume::card.footer>
</x-plume::card>
--}}
<div {{ $attributes->merge(['class' => 'rounded-xl border border-background-700/40 bg-background shadow dark:border-background-400/20 dark:bg-background-800']) }}>
    {{ $slot }}
</div>