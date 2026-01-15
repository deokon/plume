{{--
@component x-plume::card
@description Displays a card with header, content, and footer.
--}}
<div {{ $attributes->merge(['class' => 'rounded-xl border border-background-700/40 bg-background shadow dark:border-background-400/20 dark:bg-background-800']) }}>
    {{ $slot }}
</div>
