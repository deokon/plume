<li role="presentation" aria-hidden="true" {{ $attributes->merge(['class' => '[&>.icon]:size-2.5']) }}>
    {{ $slot ?? '' }}
    @if(!$slot->isNotEmpty())
        <x-plume::logo size="size-2.5" class="text-foreground/30" />
    @endif
</li>
